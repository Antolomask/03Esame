<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Contatto extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = "contatti";
    protected $primaryKey = "idContatto";
    protected $fillable = [
        "idContattoStato",
        "nome",
        "cognome",
        "sesso",
        "codiceFiscale",
        "partitaIva",
        "cittadinanza",
        "idNazioneNascita",
        "cittaNascita",
        "provinciaNascita",
        "dataNascita",
        "created_by",
        "updated_by",
    ];

     /** 
     * |----------------------------------------------|
     * |                  PUBLIC                      |
     * |----------------------------------------------|
     * 
     * Aggiungi i ruoli per il Contatto sulla tabella contatti_contattiRuoli
     * 
     * @param integer $idContatto
     * @param string|array $idRuoli
     * @return Collection 
     */
    public static function aggiungiContattoRuoli($idContatto, $idRuoli)
    {
        $Contatto = Contatto::where("idContatto", $idContatto)->firstOrFail();
        if (is_string($idRuoli)) {
            $tmp = explode(",", $idRuoli);
        } else {
            $tmp = $idRuoli;
        }
        $Contatto->ruoli()->attach($tmp);
        return $Contatto->ruoli;
    }

    // ----------------------------------------------------------------------
    public function crediti()
    {
        return $this->hasOne(ContattoCredito::class, "idContatto", "idContatto");
    }

    // ----------------------------------------------------------------------
    /**
     * Elimina i ruoli per il Contatto sulla tabella contatti_contattiRuoli
     * 
     * @param integer $idContatto
     * @param string|array $idRuoli
     * @return Collection
     */
    public static function eliminaContattoRuoli($idContatto, $idRuoli)
    {
        $Contatto = Contatto::where("idContatto", $idContatto)->firstOrFail();
        if (is_string($idRuoli)) {
            $tmp = explode(",", $idRuoli);
        } else {
            $tmp = $idRuoli;
        }
        $Contatto->ruoli()->detach($tmp);
        return $Contatto->ruoli;
    }
    // ----------------------------------------------------------------------
    public function indirizzi()
    {
        return $this->hasMany(ContattoIndirizzo::class, "idContatto", "idContatto")->orderBy("preferito", "DESC");
    }
    // ----------------------------------------------------------------------
    public function recapiti()
    {
        return $this->hasMany(ContattoRecapito::class, "idContatto", "idContatto")->orderBy("preferito", "DESC");
    }
    // ----------------------------------------------------------------------
    public function ruoli()
    {
        return $this->belongsToMany(ContattoRuolo::class, "contatti_contattiRuoli", "idContatto", "idContattoRuolo");
    }
    // ----------------------------------------------------------------------
    /**
     * Sincronizza i ruoli per il contatto sulla tabella contatti_contattiRuoli
     * 
     * @param integer $idContattoAuth
     * @param string|array $idRuoli
     * @return Collection
     */
    public static function sincronizzaContattoRuoli($idContattoAuth, $idRuoli)
    {
        $contatto = ContattoAuth::where("idContattoAuth", $idContattoAuth)->firstOrFail();
        if (is_string($idRuoli)) {
            $tmp = explode(',', $idRuoli);
        } else {
            $tmp = $idRuoli;
        }
        
        // Utilizzo il metodo sync per sincronizzare i ruoli
        $contatto->ruoli()->sync($tmp);
        // Rirotno la collezione di ruoli sincronizzati con il contatto
        return $contatto->ruoli;



    }
}
