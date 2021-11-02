<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Spatie\Permission\Models\Permission;

    class PermissionTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $permissions = [
                'amministrazione-menu',
                'houses-menu',
                'richieste-menu',
                'nominativi-menu',
                'customers-menu',
                'impostazioni-menu',
                'collaborazioni-menu',
            ];

            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }
        }
    }
