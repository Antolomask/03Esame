<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContattoStato extends Model
{
    use HasFactory;

    protected $table = "contattiStati";
    protected $primaryKey = "idContattoStato";
    protected $fillable = [
        "valore"
    ];
}
