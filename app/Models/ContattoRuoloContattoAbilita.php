<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContattoRuoloContattoAbilita extends Model
{
    use HasFactory;
    protected $table = "contattiRuoli_contattiAbilita";
    protected $primayKey = "id";
    protected $fillable = [
        "idContattoRuolo",
        "idContattoAbilita",
    ];
}
