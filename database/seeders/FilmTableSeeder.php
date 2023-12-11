<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Film::create([
            "idFilm"=> "1",
            "idCategoria"=> 1,
            "idTipologia"=> 1,
            "nome"=> "Sharknado",
            "trama"=> "Un tornado si abbatte sulla California e un branco di squali famelici fuoriesce dall'Oceano, infestando le città e spaventando a morte la popolazione.",
            "durataMin"=> "86 min",
            "annoUscita"=> "2013",
        ]);

        Film::create([
            "idFilm"=> 2,
            "idCategoria"=> 1,
            "idTipologia"=> 1,
            "nome"=> "Ai Confini della realtà",
            "trama"=> "Film in quattro episodi, ognuno diretto da un grande regista, che rende omaggio alla celebre serie di fantascienza degli anni 60: storie surreali che ritraggono in modo originale le paure e le nevrosi del mondo moderno",
            "durataMin"=> "101 min",
            "annoUscita"=> "1983",
        ]);

        Film::create([
            "idFilm"=> "3",
            "idCategoria"=> 1,
            "idTipologia"=> 1,
            "nome"=> "Bubble",
            "trama"=> "In una Tokyo isolata dal resto del mondo, a causa di bolle e anomalie gravitazionali, il destino fa incontrare un ragazzo con un talento particolare e una ragazza misteriosa.",
            "durataMin"=> "100 min",
            "annoUscita"=> "2022",
        ]);

        Film::create([
            "idFilm"=> "4",
            "idCategoria"=> 1,
            "idTipologia"=> 1,
            "nome"=> "Cypher",
            "trama"=> "Morgan Sullivan è un contabile disoccupato che conduce un'esistenza anonima. Deciso a sfuggire alla noia quotidiana della vita in periferia, cerca di intraprendere un ruolo nello spionaggio industriale.",
            "durataMin"=> "95 min",
            "annoUscita"=> "2002",
        ]);

        Film::create([
            "idFilm"=> "5",
            "idCategoria"=> 1,
            "idTipologia"=> 2,
            "nome"=> "Encanto",
            "trama"=> "In alto nelle montagne della Colombia c'è un luogo incantato chiamato Encanto. Qui, in una casa magica, vive la straordinaria famiglia Madrigal dove tutti hanno capacità fantastiche.",
            "durataMin"=> "99 min",
            "annoUscita"=> "2021",
        ]);

        Film::create([
            "idFilm"=> "6",
            "idCategoria"=> 1,
            "idTipologia"=> 2,
            "nome"=> "Spider-Man: Across the Spider-Verse",
            "trama"=> "Miles Morales torna per un'epica avventura che porterà il nostro eroe di Brooklyn attraverso il multiverso per unire le forze con Gwen Stacy e una nuova squadra di supereroi.",
            "durataMin"=> "140 min",
            "annoUscita"=> "2023",
        ]);

        Film::create([
            "idFilm"=> "7",
            "idCategoria"=> 1,
            "idTipologia"=> 2,
            "nome"=> "Luca",
            "trama"=> "Luca vive delle esperienze indimenticabili insieme al suo nuovo migliore amico Alberto. Ma entrambi nascondono un segreto: sono delle creature marine provenienti da un mondo sotto la superficie dell'acqua.",
            "durataMin"=> "95 min",
            "annoUscita"=> "2021",
        ]);

        Film::create([
            "idFilm"=> "8",
            "idCategoria"=> 1,
            "idTipologia"=> 2,
            "nome"=> "Coco",
            "trama"=> "Miguel, un giovanissimo aspirante musicista, intraprende un viaggio verso la terra dei propri antenati per scoprire i misteri nascosti dietro i racconti e le tradizioni della famiglia.",
            "durataMin"=> "105 min",
            "annoUscita"=> "2017",
        ]);

        Film::create([
            "idFilm"=> "9",
            "idCategoria"=> 1,
            "idTipologia"=> 3,
            "nome"=> "Tomb Raider",
            "trama"=> "La giovane Lara Croft, stanca di vivere lavorando come corriere in bicicletta, decide di abbandonare tutto per andare alla ricerca di suo padre, un avventuriero scomparso su un'isola leggendaria del Giappone.",
            "durataMin"=> "118 min",
            "annoUscita"=> "2018",
        ]);

        Film::create([
            "idFilm"=> "10",
            "idCategoria"=> 1,
            "idTipologia"=> 3,
            "nome"=> "Uncharted",
            "trama"=> "Nathan Drake e il suo compagno di avventure Sully si lanciano in una pericolosa ricerca per trovare il più grande tesoro perduto, mentre seguono anche gli indizi che potrebbero portare al fratello di Nathan, scomparso da tempo.",
            "durataMin"=> "116 min",
            "annoUscita"=> "2022",
        ]);

        Film::create([
            "idFilm"=> "11",
            "idCategoria"=> 1,
            "idTipologia"=> 3,
            "nome"=> "Viaggio al centro della terra",
            "trama"=> "Il vulcanologo Trevor Anderson si precipita alla ricerca di un collega scomparso e, usando come guida il celebre libro di Jules Verne, si ritrova nelle profondità della Terra, in un mondo perduto popolato da mostri marini e dinosauri.",
            "durataMin"=> "93 min",
            "annoUscita"=> "2008",
        ]);

        Film::create([
            "idFilm"=> "12",
            "idCategoria"=> 1,
            "idTipologia"=> 3,
            "nome"=> "Everest",
            "trama"=> "La mattina del 10 maggio 1996, alcuni scalatori appartenenti a due spedizioni distinte iniziano la loro ascesa finale verso la vetta dell'Everest, il punto più alto della Terra. Con poco preavviso, una violenta tempesta colpisce la montagna...", 
            "durataMin"=> "121 min",
            "annoUscita"=> "2015",
        ]);

        Film::create([
            "idFilm"=> "13",
            "idCategoria"=> 1,
            "idTipologia"=> 4,
            "nome"=> "L'esorcista del Papa",
            "trama"=> "Padre Gabriele Amorth, esorcista capo del Vaticano, scopre un'antica cospirazione mentre indaga sulla terrificante possessione di un ragazzo.",
            "durataMin"=> "103 min",
            "annoUscita"=> "2023",
        ]);

        Film::create([
            "idFilm"=> "14",
            "idCategoria"=> 1,
            "idTipologia"=> 4,
            "nome"=> "L'evocazione - The Conjuring",
            "trama"=> "Nella nuova casa in cui si trasferisce la numerosa famiglia Perron si verificano strane apparizioni e rumori inquietanti fino a vere e proprie manifestazioni paranormali.",
            "durataMin"=> "113 min",
            "annoUscita"=> "2013",
        ]);

        Film::create([
            "idFilm"=> "15",
            "idCategoria"=> 1,
            "idTipologia"=> 4,
            "nome"=> "The Nun",
            "trama"=> "In un monastero di clausura in Romania, una giovane suora si impicca chiedendo perdono al Signore. Il Vaticano invia un prete dal passato burrascoso e un novizio per far luce sull'oscuro mistero.",
            "durataMin"=> "96 min",
            "annoUscita"=> "2018",
        ]);

        Film::create([
            "idFilm"=> "16",
            "idCategoria"=> 1,
            "idTipologia"=> 4,
            "nome"=> "Sinister",
            "trama"=> "Un giornalista sta lavorando ad un libro sui crimini misteriosi e decide di cambiare casa. Lo attende una casa maledetta, infestata da un'entità paranormale.",
            "durataMin"=> "110 min",
            "annoUscita"=> "2012",
        ]);

    }
}
