<?php

namespace Database\Seeders;

use App\Models\ComuneItaliano;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComuneItalianoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = storage_path("app/csv_db/comuniItaliani.csv");
        $file = fopen($csv, "r");
        while (($data = fgetcsv($file, 200, ",")) !== false) {
            ComuneItaliano::create(
                [
                    "idComuneItaliano" => $data[0],
                    "nome" => $data[1],
                    "regione" => $data[2],
                    "metropolitana" => $data[3],
                    "siglaAutomobilistica" => $data[4],
                    "codiceCatastale" => $data[5],
                    "capoluogo" => $data[6],
                    "multicap" => $data[7],
                    "cap" => $data[8],
                    "capFine" => $data[9],
                    "capInizio" => $data[10],
                ]
            );
        }
    }
}
