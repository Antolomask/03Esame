<?php

namespace Database\Seeders;

use App\Models\ContattoAccesso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattoAccessoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContattoAccesso::create(['id' => 1, 'idContatto' => 1, 'autenticato' => 1, 'ip' => "::1"]);
        ContattoAccesso::create(['id' => 30, 'idContatto' => 2, 'autenticato' => 1, 'ip' => "::1"]);
        ContattoAccesso::create(['id' => 101, 'idContatto' => 3, 'autenticato' => 1, 'ip' => "::1"]);
    }
}
