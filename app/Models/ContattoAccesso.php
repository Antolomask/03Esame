<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContattoAccesso extends Model
{
    use HasFactory;
    protected $table = "contattiAccessi";
    protected $fillable = [
        "idContatto",
        "autenticato",
        "ip",
    ];

    /** 
     * |----------------------------------------------|
     * |                  PUBLIC                      |
     * |----------------------------------------------|
     * 
     *  Aggiungi tentativo fallito per l'idContatto 
     * 
     * @param string $idContatto
     */
    public static function aggiungiAccesso($idContatto)
    {
        ContattoAccesso::eliminaTentativi($idContatto);
        return ContattoAccesso::nuovoRecord($idContatto, 1);
    }
    //---------------------------------------------------------------------------
    /**
     * Aggiungi tentativo fallito per l'idContatto
     * 
     * @param string $idContatto
     */
    public static function aggiungiTentativoFallito($idContatto)
    {
        return ContattoAccesso::nuovoRecord($idContatto, 0);
    }
    //---------------------------------------------------------------------------
    /**
     * Conta quanti tentativi per l'idContatto sono registrati
     * 
     * @param string $idContatto
     * @return integer
     */
    public static function contaTentativi($idContatto)
    {
        $tmp = ContattoAccesso::where("idContatto", $idContatto)->where("autenticato", 0)->count();
        return $tmp;
    }
    //---------------------------------------------------------------------------

    /** 
     * |----------------------------------------------|
     * |                  PROTECTED                   |
     * |----------------------------------------------|
     * 
     * Conta quanti tentativi per l'idContatto sono registrati
     * 
     * @param string $idContatto
     * @param boolean $autenticato
     * @return App\Models\ContattoAccesso
     */
    protected static function nuovoRecord($idContatto, $autenticato)
    {
        $tmp = ContattoAccesso::create([
            "idContatto" => $idContatto,
            "autenticato" => $autenticato,
            "ip" => request()->ip(),
        ]);
        return $tmp;
    }
    //---------------------------------------------------------------------------
    /**
     * Elimina tutti i tentativi falliti per l'idContatto
     * 
     * @param string $idContatto
     */
    public static function eliminaTentativi($idContatto)
    {
        // Ricerca dei tentativi falliti per l'idContatto
        $tentativi = ContattoAccesso::where("idContatto", $idContatto)
            ->where("autenticato", 0)
            ->get();

        // Iterazione sui tentativi trovati e cancellazione di ciascun record
        foreach ($tentativi as $tentativo) {
            $tentativo->delete(); // Eliminazione del tentativo fallito
        }
    }
}
