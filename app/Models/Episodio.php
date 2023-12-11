<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episodio extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "episodi";
    protected $primaryKey = "idEpisodio";
    protected $fillable = [
        "idSerieTv",
        "idTipologia",
        "nome",
        "stagione",
        "durataEpisodioMin",
        "created_at",
        "updated_at",
    ];
}
