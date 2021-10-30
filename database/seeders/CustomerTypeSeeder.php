<?php

namespace Database\Seeders;

use App\Models\CustomerType;
use Illuminate\Database\Seeder;

class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'Venditore',
            'Acquirente',
            'Inquilino',
            'Proprietario'
        ];

        foreach ($array as $item){
            CustomerType::create([
                'name' => $item,
            ]);
        }
    }
}
