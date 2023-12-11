<?php

namespace Database\Seeders;

use App\Models\ContattoStato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattoStatoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContattoStato::create(["idContattoStato" => 1, "valore" => "Attivo"]);
        ContattoStato::create(["idContattoStato" => 2, "valore" => "Disattivato"]);
    }
}
