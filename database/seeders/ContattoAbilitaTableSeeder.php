<?php

namespace Database\Seeders;

use App\Models\ContattoAbilita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattoAbilitaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContattoAbilita::create([
            "idContattoAbilita" => 1,
            "nome" => "Leggere", 
            "sku" => "leggere"
        ]);

        ContattoAbilita::create([
            "idContattoAbilita" => 2,
            "nome" => "Creare", 
            "sku" => "creare"
        ]);

        ContattoAbilita::create([
            "idContattoAbilita" => 3,
            "nome" => "Aggiornare", 
            "sku" => "aggiornare"
        ]);

        ContattoAbilita::create([
            "idContattoAbilita" => 4,
            "nome" => "Eliminare", 
            "sku" => "eliminare"
        ]);
    }
}
