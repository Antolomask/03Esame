<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SerieTv extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "serieTv";
    protected $primaryKey = "idSerieTv";
    protected $fillable = [
        "idCategoria",
        "idTipologia",
        "nome",
        "trama",
        "stagioni",
        "episodi",
        "annoUscita",
        "created_at",
        "updated_at"
    ];
}
