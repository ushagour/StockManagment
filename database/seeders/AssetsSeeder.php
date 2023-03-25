<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset;


class AssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //those are some assets that ii fond on the net 
        $assets = [
            "Lecteur SESAM-Vitale SET 2",
            "Draps d'examen - Ouate - Gaufrés - 150 formats (49.5x35 cm) - 9 rlx",
            "Thermomètre électronique digital FLEXI",
            "Crème lavante TENA Wash Cream Proskin - 500 ml",
            "Bande adhésive Extensa Plus Hartmann",
            "Gants latex non poudrés non stériles Hartmann Peha-soft",
            "Hygromètre thermomètre d'intérieur Hygrobaby",
            "Batterie pour otoscope Spengler Smartled 5500-R",
            "Socle chargeur pour otoscope Spengler Smartled 5500-R"
        ];

        foreach ($assets as $asset) {
            Asset::factory()->create([
                'name'        => $asset,
                'description' => $asset
            ]);
        }





    }
}
