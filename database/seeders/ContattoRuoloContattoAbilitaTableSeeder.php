<?php

namespace Database\Seeders;

use App\Models\ContattoRuoloContattoAbilita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattoRuoloContattoAbilitaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContattoRuoloContattoAbilita::create(["idContattoAbilita"=> 1, "idContattoRuolo"=> 1]);
        ContattoRuoloContattoAbilita::create(["idContattoAbilita"=> 2, "idContattoRuolo"=> 1]);
        ContattoRuoloContattoAbilita::create(["idContattoAbilita"=> 3, "idContattoRuolo"=> 1]);
        ContattoRuoloContattoAbilita::create(["idContattoAbilita"=> 4, "idContattoRuolo"=> 1]);
        ContattoRuoloContattoAbilita::create(["idContattoAbilita"=> 1, "idContattoRuolo"=> 2]);
        ContattoRuoloContattoAbilita::create(["idContattoAbilita"=> 3, "idContattoRuolo"=> 2]);
        
    }
}
