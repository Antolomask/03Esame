<?php

namespace Database\Seeders;

use App\Models\Tipologia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipologiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipologia::create(['idTipologia'=> 1, 'nome'=> 'Fantascienza']);    
        Tipologia::create(['idTipologia'=> 2, 'nome'=> 'Animazione']);
        Tipologia::create(['idTipologia'=> 3, 'nome'=> 'Avventura']);
        Tipologia::create(['idTipologia'=> 4, 'nome'=> 'Horror']);
    }
}
