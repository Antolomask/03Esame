<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configurazione extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "configurazioni";
    protected $primaryKey = "idConfigurazione";

    protected $fillable = [
        "chiave",
        "valore",
        "created_by",
        "updated_by"
    ];

    // metodo per leggere il valore in base alla chiave
    protected static function leggiValore($chiave)
    {
        $configurazione = self::where('chiave', $chiave)->first();

        if ($configurazione) {
            return $configurazione->valore;
        }

        return null;
    }
}
