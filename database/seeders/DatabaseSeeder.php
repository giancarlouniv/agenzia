<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(ContractSeeder::class);
        $this->call(CustomerTypeSeeder::class);
        $this->call(HouseTypeSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        \App\Models\House::factory()->count(200)->create();
        \App\Models\Customer::factory()->count(50)->create();
        \App\Models\Person::factory()->count(200)->create();
        \App\Models\HousePerson::factory()->count(20)->create();
        \App\Models\HouseCustomer::factory()->count(10)->create();
    }
}
