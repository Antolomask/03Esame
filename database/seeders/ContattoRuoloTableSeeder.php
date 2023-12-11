<?php

namespace Database\Seeders;

use App\Models\ContattoRuolo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattoRuoloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContattoRuolo::create(['idContattoRuolo' => 1, "nome" => "Amministratore"]);
        ContattoRuolo::create(['idContattoRuolo' => 2, "nome" => "Utente"]);
        ContattoRuolo::create(['idContattoRuolo' => 3, "nome" => "Ospite"]);
    }
}
