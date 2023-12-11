<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as classePerGate;

class ContattoRuolo extends classePerGate
{
    use HasFactory, SoftDeletes;
    protected $table = "contattiRuoli";
    protected $primaryKey = "idContattoRuolo";

    protected $fillable = [
        "nome",

    ];

    /** 
     * |----------------------------------------------|
     * |                  PUBLIC                      |
     * |----------------------------------------------|
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function abilita()
    {
        return $this->belongsToMany(ContattoAbilita::class, "contattiRuoli_contattiAbilita", "idContattoRuolo", "idContattoAbilita");
    }

    public function contatti()
    {
        return $this->belongsToMany(Contatto::class, 'contatti_contattiRuoli', 'idContattoRuolo', 'idContatto');
    }   
    //----------------------------------------------------------------------------------------------------------------------------------------
    /**
     * Aggiungi le abilita per il ruolo sulla tabella contattiRuoli_contattiAbilita
     * 
     * @param integer $idRuolo
     * @param string|array $idAbilita
     * @return Collection
     */
    public static function aggiungiRuoloAbilita($idRuolo, $idAbilita)
    {
        $ruolo = ContattoRuolo::where("idContattoRuolo", $idRuolo)->firstOrFail();
        if (is_string($idAbilita)) {
            $tmp = explode(",", $idAbilita);
        } else {
            $tmp = $idAbilita;
        }
        $ruolo->abilita()->attach($tmp);
        return $ruolo->abilita;
    }
}
