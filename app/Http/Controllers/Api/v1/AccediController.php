<?php

namespace App\Http\Controllers\api\v1;

use App\Helpers\AppHelpers;

use App\Http\Controllers\Controller;
use App\Models\Configurazione;
use App\Models\ContattoAccesso;
use App\Models\ContattoAuth;
use App\Models\ContattoPassword;
use App\Models\ContattoSessione;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AccediController extends Controller
{
    /**
     * Cerco l'hash dello user nel DB
     *
     * @param  string $utente
     * @param  string $hash
     * @return AppHelpers\ritornaCustom
     */
    public function searchMail($utente)
    {
        $tmp = (ContattoAuth::esisteUtente($utente)) ? true : false;
        return AppHelpers::rispostaCustom($tmp);
    }

    // ----------------------------------------------------------------------
    /**
     * Punto di ingresso del login
     *
     * @param string $utente
     * @param string $hash
     * @return AppHelper\ritornoCustom
     */
    public function show($utente, $hash = null)
    {
        if ($hash == null) {
            return AccediController::controlloUtente($utente);
        } else {
            return AccediController::controlloPassword($utente, $hash);
        }
    }

    // ----------------------------------------------------------------------
    /**
     * Crea il token per sviluppo 
     * 
     * @return AppHelper\rispostaCustom
     */
    public static function testToken()
    {
        $utente = hash("sha512", trim("Admin@utente"));
        $password = hash("sha512", trim("Password123!"));
        $sale = hash("sha512", trim("sale"));
        $sfida = hash("sha512", trim("sfida"));
        $secretJWT = hash("sha512", trim("Secret"));
        $auth = ContattoAuth::where('user', $utente)->firstOrFail();
        if ($auth != null) {
            $auth->inizioSfida = time();
            //$auth->sfida = $sfida
            $auth->secretJWT = $secretJWT;
            $auth->save();

            $recordPassword = ContattoPassword::passwordAttuale($auth->idContatto);
            if ($recordPassword != null) {
                $recordPassword->sale = $sale;
                $recordPassword->psw = $password;
                $recordPassword->save();
                //$cipher = AppHelpers::CreaPasswordCifrata($password, $sale, $sfida);
                $cipher = AppHelpers::nascondiPassword($password, $sale);
                $tk = AppHelpers::creaTokenSessione($auth->idContatto, $secretJWT);
                $dati = array("token" => $tk, "xLogin" => $cipher);
                $sessione = ContattoSessione::where("idContatto", $auth->idContatto)->firstOrFail();
                $sessione->token = $tk;
                $sessione->inizioSessione = time();
                $sessione->save();
                return AppHelpers::rispostaCustom($dati);
            }
        }
    }

    // ----------------------------------------------------------------------
    /**
     * 
     */

    public function hash($stringa)
    {
        return hash("sha512", $stringa);
    }

    // ----------------------------------------------------------------------------------------------------------
    /**
     * Crea il token per sviluppo
     *
     * @param string $utente
     * @return AppHelper\rispostaCustom
     */
    public static function testLogin($hashUtente, $hashSalePsw)
    {

        print_r(AccediController::controlloPassword($hashUtente, $hashSalePsw));
    }

    // ----------------------------------------------------------------------
    /**
     * Verifica il token ad ogni chiamata
     * 
     * @param string $token
     * @return object
     */

    public static function verificaToken($token)
    {
        $rit = null;
        $sessione = ContattoSessione::datiSessione($token);
        if ($sessione != null) {
            $inizioSessione = $sessione->inizioSessione;
            $durataSessione = Configurazione::leggivalore("durataSessione");
            $scadenzaSessione = $inizioSessione + $durataSessione;
            // echo ("PUNTO 1 <br>")
            if (time() < $scadenzaSessione) {
                // echo ("PUNTO 2 <br>")
                $auth = ContattoAuth::where('idContatto', $sessione->idContatto)->first();
                if ($auth != null) {
                    // echo ("PUNTO 3 <br>")
                    $secretJWT = $auth->secretJWT;
                    $payload = AppHelpers::validaToken($token, $secretJWT, $sessione);
                    if ($payload != null) {
                        // echo ("PUNTO 4 <br>")
                        $rit = $payload;
                    } else {
                        abort(403,'TK_0006');
                    }
                }else{
                    abort(403,'TK_0005');
                }
            } else {
                abort(403,"TK_0004");
            }
        } else {
            abort (403,"TK_0003");
        }
        return $rit;
    }


    /** 
     * |----------------------------------------------|
     * |                PROTECTED                     |
     * |----------------------------------------------|
     * 
     * Controllo validità utente
     * 
     * @param string $utente
     * @return AppHelper\rispostaCustom 
     * */ 
    protected static function controlloUtente($utente)
    {
        // $sfida = hash("sha512", trim (Str::random(200)));
        $sale = hash("sha512", trim(Str::random(200)));
        if (ContattoAuth::esisteUtenteValidoPerLogin($utente)) {
            //esiste 
            $auth = ContattoAuth::where('user', $utente)->first();
            // $auth->sfida = $sfida
            $auth->secretJWT = hash("sha512", trim(Str::random(200)));
            $auth->inizioSfida = time();
            $auth->save();
            $recordPassword = ContattoPassword::passwordAttuale($auth->idContatto);
            $recordPassword->sale = $sale;
            $recordPassword->save();
        } else {
            //non esiste, quindi invento sfida e sale per confondere le idee

        }
        //dati = array("sfida" => $sfida, 'sale' => $sale);
        $dati = array("sale" => $sale);
        return AppHelpers::rispostaCustom($dati);
    }
    
    //---------------------------------------------------------------------------
    /**
     * Punto di ingresso del login
     * 
     * @param string $utente
     * @param string $hash
     * @return AppHelper\rispostaCustom
     */
    protected static function controlloPassword($utente, $hashClient)
    {
        if (ContattoAuth::esisteUtenteValidoPerLogin($utente)) {
            //esiste
            $auth = ContattoAuth::where('user', $utente)->first();
            // $sfida = $auth->$sfida;
            $secretJWT = $auth->secretJWT;
            $inizioSfida = $auth->inizioSfida;
            $durataSessione = Configurazione::leggiValore("durataSessione");
            $maxTentativi = Configurazione::leggiValore("maxLoginErrati");
            $scadenzaSfida = $inizioSfida + $durataSessione;
            if (time() < $scadenzaSfida) {
                $tentativi = ContattoAccesso::contaTentativi($auth->idContatto);
                if ($tentativi < $maxTentativi - 1) {
                    // proseguo
                    $recordPassword = ContattoPassword::passwordAttuale($auth->idContatto);

                    $password = $recordPassword->psw;
                    $sale = $recordPassword->sale;
                    //$hashFinaleDB = AppHelper::creaPasswordCifrata($password, $sale, $sfida);
                    $passwordNascostaDB = AppHelpers::nascondiPassword($password, $sale);

                    //$passwordClient = AppHelper::decifra($hashClient, $secretJWT);
                    if ($hashClient == $passwordNascostaDB) {
                        //login corretto quindi creo Token
                        $tk = AppHelpers::creaTokenSessione($auth->idContatto, $secretJWT);
                        ContattoAccesso::eliminaTentativi($auth->idContatto);
                        $accesso = ContattoAccesso::aggiungiAccesso($auth->idContatto);

                        ContattoSessione::eliminaSessione($auth->idContatto);
                        ContattoSessione::aggiornaSessione($auth->idContatto, $tk);

                        $dati = array("tk" => $tk);
                        return AppHelpers::rispostaCustom($dati);
                    } else {
                        ContattoAccesso::aggiungiTentativoFallito($auth->idContatto);
                        abort(403, "ERR L004");
                    }
                } else {
                    abort(403, "ERR L003");
                }
            } else {
                ContattoAccesso::aggiungiTentativoFallito($auth->idContatto);
                abort(403, "ERR L002");
            }
        } else {
            abort(403, "ERR L001");
        }
    }
     

}
