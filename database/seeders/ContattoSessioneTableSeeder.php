<?php

namespace Database\Seeders;

use App\Models\ContattoSessione;
use Doctrine\Common\Lexer\Token;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ContattoSessioneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContattoSessione::create([
            'idContattoSessione' => 1,
            'idContatto' => 1,
        ]);

        ContattoSessione::create([
            'idContattoSessione' => 2,
            'idContatto' => 2,
        ]);

        ContattoSessione::create([
            'idContattoSessione' => 3,
            'idContatto' => 3,
        ]);


    }
}
