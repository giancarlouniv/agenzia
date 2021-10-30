<?php

namespace Database\Seeders;

use App\Models\HouseType;
use Illuminate\Database\Seeder;

class HouseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'Appartamento',
            'Villa Singola',
            'Villa Bifamiliare',
            'Negozio',
            'Magazzino',
            'Garage',
            'Ufficio',
            'Stanza',
        ];

        foreach ($array as $item){
            HouseType::create([
                'name' => $item,
            ]);
        }
    }
}
