<?php

namespace Database\Seeders;

use App\Models\Contatto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contatto::create([
            "idContatto" => 1,
            "idContattoStato" => 1,  // 1 = attivo / 2 = non attivo //
            "nome" => "Antonio",
            "cognome" => "Sterlaccio",
            "sesso" => "0",   // 0 = uomo / 1 = donna //
            "codiceFiscale" => "STRNTN99D20A662P",
            "partitaIva" => "",
            "cittadinanza"=> "italiana",
            "idNazioneNascita" => 1,
            "cittaNascita" => "Bari",
            "provinciaNascita" => "BA",
            "dataNascita" => 20/04/1999,
        ]);

        Contatto::create([
            "idContatto" => 2,
            "idContattoStato" => 1,  // 1 = attivo / 2 = non attivo //
            "nome" => "Francesco",
            "cognome" => "Bellini",
            "sesso" => "0",   // 0 = uomo / 1 = donna // 
            "cittadinanza"=> "italiana",
            "idNazioneNascita" => 1,
            "cittaNascita" => "Torino",
            "provinciaNascita" => "TO",
            "dataNascita" => 24/10/1997,
        ]);

        Contatto::create([
            "idContatto" => 3,
            "idContattoStato" => 2,  // 1 = attivo / 2 = non attivo //
            "nome" => "Alessandro",
            "cognome" => "Vicario",
            "sesso" => "0",   // 0 = uomo / 1 = donna // 
            "cittadinanza"=> "italiana",
            "idNazioneNascita" => 1,
            "cittaNascita" => "Milano",
            "provinciaNascita" => "MI",
            "dataNascita" => 12/07/1985,
        ]);
    }
}
