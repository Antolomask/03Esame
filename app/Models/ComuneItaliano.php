<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComuneItaliano extends Model
{
    use HasFactory;
    protected $table = "comuniitaliani";
    protected $primaryKey = "idComuneItaliano";

    protected $fillable = [
        "nome",
        "regione",
        "metropolitana",
        "siglaAutomobilistica",
        "codiceCatastale",
        "capoluogo",
        "multicap",
        "cap",
        "capFine",
        "capInizio",
    ];
}
