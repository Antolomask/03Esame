<?php

namespace Database\Seeders;

use App\Models\ContattoAuth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ContattoAuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContattoAuth::create([
            'idContattoAuth' => 1,
            'idContatto' => 1,
            'user' => '',
            'sfida' => '',
            'secretJWT' => '',
            'obbligoCambio' => '0', 
        ]);

        ContattoAuth::create([
            'idContattoAuth' => 2,
            'idContatto' => 2,
            'user' => '',
            'sfida' => '',
            'secretJWT' => '',
            'obbligoCambio' => '0', 
        ]);
    }
}
