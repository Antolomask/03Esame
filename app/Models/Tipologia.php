<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipologia extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tipologie";
    protected $primaryKey = "idTipologia";

    protected $fillable = [
        "nome",
        "created_at",
        "updated_at"
    ];
}
