<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContattoContattoRuolo extends Model
{
    use HasFactory;
    protected $table = "contatti_contattiRuoli";
    protected $primaryKey = "id";

    protected $fillable = [];
}
