<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ContattoRuoloTableSeeder::class,
            NazioneTableSeeder::class,
            ComuneItalianoTableSeeder::class,
            CategoriaTableSeeder::class,
            TipologiaTableSeeder::class,
            FilmTableSeeder::class,
            SerieTvTableSeeder::class,
            EpisodioTableSeeder::class,
            ContattoStatoTableSeeder::class,
            ContattoAbilitaTableSeeder::class,
            ContattoTableSeeder::class,
            ContattoContattoRuoloTableSeeder::class,
            ContattoRuoloContattoAbilitaTableSeeder::class,
            ContattoAuthTableSeeder::class,
            ContattoAccessoTableSeeder::class,
            ContattoPasswordTableSeeder::class,
            ContattoSessioneTableSeeder::class,
            ConfigurazioneTableSeeder::class,
        ]);
    }
}
