<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['idCategoria'=> 1, 'nome'=> 'Film', 'visualizzato' => 1]);
        Categoria::create(['idCategoria'=> 2, 'nome'=> 'SerieTv']);   
    }
}
