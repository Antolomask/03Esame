<?php

namespace Database\Seeders;

use App\Models\SerieTv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SerieTvTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SerieTv::create([
            "idSerieTv"=> "1",
            "idCategoria"=> 2,
            "idTipologia"=> 1,
            "nome"=> "Invasion",
            "trama"=> "Una malattia epidemica di origine extraterrestre minaccia seriamente la sopravvivenza dell'intera umanità.",
            "stagioni"=> "2",
            "episodi"=> "20",
            "annoUscita"=> "2021",
        ]);

        SerieTv::create([
            "idSerieTv"=> "2",
            "idCategoria"=> 2,
            "idTipologia"=> 1,
            "nome"=> "Fondazione",
            "trama"=> "Quando il rivoluzionario Dott. Hari Seldon (Jared Harris, Chernobyl) predice l'imminente caduta dell'Impero, lui e una banda di fedeli seguaci si avventurano ai confini della galassia per stabilire la Fondazion...",
            "stagioni"=> "2",
            "episodi"=> "20",
            "annoUscita"=> "2021",
        ]);

        SerieTv::create([
            "idSerieTv"=> "3",
            "idCategoria"=> 2,
            "idTipologia"=> 1,
            "nome"=> "The 100",
            "trama"=> "L'umanità, lontana dalla Terra dopo una guerra nucleare che l'ha decimata, invia cento giovani problematici a ricolonizzare il pianeta. Qui i ragazzi affrontano prove che mettono in forse il loro futuro.",
            "stagioni"=> "7",
            "episodi"=> "100",
            "annoUscita"=> "2014",
        ]);

        SerieTv::create([
            "idSerieTv"=> "4",
            "idCategoria"=> 2,
            "idTipologia"=> 1,
            "nome"=> "The Rain",
            "trama"=> "Sei anni dopo che un virus legato alla pioggia ha quasi estinto l'umanità, due fratelli abbandonano il bunker in cui erano stati lasciati. Tra i resti della civiltà scomparsa...",
            "stagioni"=> "3",
            "episodi"=> "20",
            "annoUscita"=> "2018",
        ]);

        SerieTv::create([
            "idSerieTv"=> "5",
            "idCategoria"=> 2,
            "idTipologia"=> 2,
            "nome"=> "Naruto",
            "trama"=> "Naruto Uzumaki, un giovane ninja che cerca il riconoscimento dei suoi coetanei e sogna di diventare l'Hokage, il leader del suo villaggio.",
            "stagioni"=> "5",
            "episodi"=> "220",
            "annoUscita"=> "1999",
        ]);

        SerieTv::create([
            "idSerieTv"=> "6",
            "idCategoria"=> 2,
            "idTipologia"=> 2,
            "nome"=> "Bleach",
            "trama"=> "La serie racconta le avventure dello Shinigami sostituto Ichigo Kurosaki e dei suoi compagni, nella lotta per proteggere l'aldilà in cui risiedono le anime, conosciuto come Soul Society",
            "stagioni"=> "16",
            "episodi"=> "366",
            "annoUscita"=> "2004",
        ]);

        SerieTv::create([
            "idSerieTv"=> "7",
            "idCategoria"=> 2,
            "idTipologia"=> 2,
            "nome"=> "L'attacco dei Giganti",
            "trama"=> "La storia ruota attorno al giovane Eren Jaeger, a sua sorella adottiva Mikasa Ackermann e al loro amico d'infanzia Armin Arelet, le cui vite vengono stravolte dall'attacco...",
            "stagioni"=> "4",
            "episodi"=> "94",
            "annoUscita"=> "2013",
        ]);

        SerieTv::create([
            "idSerieTv"=> "8",
            "idCategoria"=> 2,
            "idTipologia"=> 2,
            "nome"=> "Death Parade",
            "trama"=> "Quando due persone muoiono nello stesso istante, vengono spedite al Quindecim, un bar molto particolare, e sono costrette a partecipare ad un gioco che deciderà le sorti della loro anima.",
            "stagioni"=> "1",
            "episodi"=> "12",
            "annoUscita"=> "2015",
        ]);

        SerieTv::create([
            "idSerieTv"=> "9",
            "idCategoria"=> 2,
            "idTipologia"=> 3,
            "nome"=> "Vikings",
            "trama"=> "Con l'aiuto del fratello Rollo e dell'amico Floki, l'ambizioso guerriero vichingo Ragnar costruisce una flotta per spingersi verso le inesplorate coste inglesi: il suo progetto...",
            "stagioni"=> "6",
            "episodi"=> "89",
            "annoUscita"=> "2013",
        ]);

        SerieTv::create([
            "idSerieTv"=> "10",
            "idCategoria"=> 2,
            "idTipologia"=> 3,
            "nome"=> "The Mandalorian",
            "trama"=> "Le avventure di un uomo, pistolero solitario e cacciatore di taglie, che si fa strada attraverso i confini più remoti della galassia, lontano dalla giurisdizione della Nuova Repubblica.",
            "stagioni"=> "3",
            "episodi"=> "24",
            "annoUscita"=> "2019",
        ]);

        SerieTv::create([
            "idSerieTv"=> "11",
            "idCategoria"=> 2,
            "idTipologia"=> 3,
            "nome"=> "One Piece",
            "trama"=> "Con il suo cappello di paglia e una ciurma sgangherata, il pirata Monkey D. Luffy parte per un viaggio epico in cerca del tesoro e poter diventare il prossimo Re dei Pirati.",
            "stagioni"=> "1",
            "episodi"=> "8",
            "annoUscita"=> "2023",
        ]);

        SerieTv::create([
            "idSerieTv"=> "12",
            "idCategoria"=> 2,
            "idTipologia"=> 3,
            "nome"=> "The Witcher",
            "trama"=> "In un mondo abitato da diverse creature magiche, Geralt, un cacciatore di mostri mutante dagli incredibili poteri, deve combattere per salvare le specie pacifiche da quelle bellicose.",
            "stagioni"=> "3",
            "episodi"=> "24",
            "annoUscita"=> "2019",
        ]);

        SerieTv::create([
            "idSerieTv"=> "13",
            "idCategoria"=> 2,
            "idTipologia"=> 4,
            "nome"=> "Dark",
            "trama"=> "La scomparsa di due bambini in un piccolo villaggio in Germania mette in pericolo la vita e le relazioni di quattro famiglie. Le indagini per ritrovare i ...",
            "stagioni"=> "3",
            "episodi"=> "26",
            "annoUscita"=> "2017",
        ]);

        SerieTv::create([
            "idSerieTv"=> "14",
            "idCategoria"=> 2,
            "idTipologia"=> 4,
            "nome"=> "Van Helsing",
            "trama"=> "Vanessa van Helsing, figlia del famoso cacciatore di vampiri Abraham, si sveglia da un lungo coma e scopre che i vampiri stanno controllando il mondo...",
            "stagioni"=> "5",
            "episodi"=> "65",
            "annoUscita"=> "2016",
        ]);

        SerieTv::create([
            "idSerieTv"=> "15",
            "idCategoria"=> 2,
            "idTipologia"=> 4,
            "nome"=> "The Last of Us",
            "trama"=> "Da Boston a Salt Lake City, un uomo e una ragazza viaggiano per tentare di salvare l'umanità, affrontando i pericoli mortali di un mondo devastato da una piaga apocalittica.",
            "stagioni"=> "1",
            "episodi"=> "9",
            "annoUscita"=> "2023",
        ]);

        SerieTv::create([
            "idSerieTv"=> "16",
            "idCategoria"=> 2,
            "idTipologia"=> 4,
            "nome"=> "The Walking Dead",
            "trama"=> "Rick Grimes, agente di polizia, si risveglia dal coma in un mondo devastato dagli zombi. Sopravvivere diventa allora l'assoluta priorità.",
            "stagioni"=> "11",
            "episodi"=> "177",
            "annoUscita"=> "2010",
        ]);
    }
}
