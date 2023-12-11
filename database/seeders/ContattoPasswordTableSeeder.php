<?php

namespace Database\Seeders;

use App\Models\ContattoPassword;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ContattoPasswordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContattoPassword::create([
            'idContattoPassword' => 1,
            'idContatto' => 1,
            'psw' => '',
            'sale' => ''
        ]);

        ContattoPassword::create([
            'idContattoPassword' => 2,
            'idContatto' => 2,
            'psw' => '',
            'sale' => ''
        ]);
    }
}
