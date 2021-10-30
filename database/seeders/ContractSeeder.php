<?php

namespace Database\Seeders;

use App\Models\Contract;
use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'Vendita',
            'Locazione',
        ];

        foreach ($array as $item){
            Contract::create([
                'name' => $item,
            ]);
        }
    }
}
