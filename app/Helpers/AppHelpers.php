<?php

namespace App\Helpers;

use App\Models\Contatto;
use App\Models\ContattoAuth;
use Illuminate\Support\Facades\DB;
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;
use stdClass;

class AppHelpers
{

    // *** PUBLIC *** //
    /**
     * Toglie il required alle rules di aggiornamento
     * 
     * @param array $rules
     * @return array
     */
    public static function aggiornaRegoleHelper($rules)
    {
        $newRules = array();
        foreach ($rules as $key => $value) {
            $newRules[$key] = str_replace("required|", "", $value);
        }
        return $newRules;
    }

    //---------------------------------------------------------------------------

    /**
     * Unisci password e sale e fai HASH
     * 
     * @param string $testo da cifrare
     * @param string $chiave usata da cifrare 
     * @return string
     */
    public static function cifra($testo, $chiave)
    {
        $testoCifrato = AesCtr::encrypt($testo, $chiave, 256);
        return base64_encode($testoCifrato);
    }

    //---------------------------------------------------------------------------

    /**
     * Estrae i nomi dei campi dalla tabella sul DB
     * 
     * @param array $tabella
     * @return array
     */
    public static function colonnaTabellaDB($tabella)
    {
        $SQL = "SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema='" . DB::connection()->getDatabaseName() . "' AND table_name='" . $tabella . "';";
        $tmp = DB::select($SQL);
        return $tmp;
    }
    /**
     * Estrae i nomi dei campi della tabella sul DB
     * 
     * @param string $password
     * @param string $sale
     * @param string $sfida
     * @return array
     */
    public static function creaPasswordCifrata($password, $sale, $sfida)
    {
        $hashPasswordESale = AppHelpers::nascondiPassword($password, $sale,);
        $hashFinale = AppHelpers::cifra($hashPasswordESale, $sfida);
        return $hashFinale;
    }

    //---------------------------------------------------------------------------

    /**
     * Toglie il required alle rules di aggiornamento
     * 
     * @param string $secretJWT come chiave di cifratura
     * @param integer $idContatto
     * @param string $secretJWT
     * @param integer $usaDa unixtime abilitazione uso token
     * @param integer $scade unixtime scadenza uso token
     * @return string
     * 
     */
    public static function creaTokenSessione($idContatto, $key, $usaDa = null, $scade = null)
    {
        $maxTime = 15 * 24 * 60 * 60; // Il token scade sempre dopo 15gg max
        $recordContatto = Contatto::where("idContatto", $idContatto)->first();
        $t = time();
        $nbf = ($usaDa == null) ? $t : $usaDa;
        $exp = ($scade == null) ? $nbf + $maxTime : $scade;
        $ruolo = $recordContatto->ruoli[0];
        $idRuolo = $ruolo->idContattoRuolo;
        $abilita = $ruolo->abilita->toArray();
        $abilita = array_map(function ($arr) {
            return $arr["idContattoAbilita"];
        }, $abilita);

        // $key = 'password123!';
        $arr = [
            'iss' => 'http://codex.it',
            'aud' => null,
            'iat' => $t,
            'nbf' => $nbf,
            'exp' => $exp,
            'data' => array(
                'idContatto' => $idContatto,
                'idContattoStato' => $recordContatto->idContattoStato,
                'idContattoRuolo' => $idRuolo,
                'abilita' => $abilita,
                'nome' => trim($recordContatto->nome . " " . $recordContatto->cognome)
            )
        ];

        $token = JWT::encode($arr, $key, 'HS256');
        // $decoded = JWT::decode($token, new Key($key, 'HS256'));
        // print_r($decoded);
        return $token;
    }
    /**
     * Unisci password e sale e fai HASH
     * 
     * @param string $testo da decifrare
     * @param string $chiave usata per decifrare
     * @return string
     */
    public static function decifra($testoCifrato, $chiave)
    {
        $testoCifrato = base64_decode($testoCifrato);
        return AesCtr::decrypt($testoCifrato, $chiave, 256);
    }

    //---------------------------------------------------------------------------
    /**
     * Controlla se è amministratore
     * 
     * @param string $idGruppo
     * @return boolean
     */
    public static function isAdmin($idGruppo)
    {
        return ($idGruppo == 1) ? true : false;
    }

    //---------------------------------------------------------------------------
    /**
     * Unisci password e sale e fai HASH
     * 
     * @param string $password
     * @param string $sale
     * @return string
     */
    public static function nascondiPassword($psw, $sale)
    {
        return hash("sha512", $psw . $sale);
    }

    //---------------------------------------------------------------------------
    /**
     * Controlla se esiste l'Contatto passato
     * 
     * @param boolean $successo TRUE se la richiesta è andata a buon fine
     * @param integer $codice STATUS CODe della richiesta
     * @param array $dati Dati richiesta
     * @param string $messaggio
     * @param array $errori
     * @param array
     */
    public static function rispostaCustom($dati, $msg = null, $err = null)
    {
        $response = array();
        $response["data"] = $dati;
        if ($msg != null) $response["message"] = $msg;
        if ($err != null) $response["error"] = $err;
        return $response;
    }
    //---------------------------------------------------------------------------
    /**
     * Valida Token
     * 
     * @param string $token
     * @param string $messaggio
     * @param array $errori
     * @return object
     */
    public static function validaToken($token, $secretJWT, $sessione)
    {
        
        $rit = null;
        $payload = JWT::decode($token, new Key($secretJWT, 'HS256'));
        // echo("VALIDA 1<br>);
        if ($payload->iat <= $sessione->inizioSessione) {
            if ($payload->data->idContatto == $sessione->idContatto) {
                $rit = $payload;
                // echo ("VALIDA 2 <br>");
            }
        }
        return $rit;
    }
}
