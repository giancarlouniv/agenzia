<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

    class CreateAdminUserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $user = User::create([
                'name' => 'Giancarlo',
                'email' => 'giancarlouzzo@gmail.com',
                'password' => Hash::make('123456789')
            ]);

            $user2 = User::create([
                'name' => 'Luciano Frenna',
                'email' => 'agenzia.easyimmobiliare@gmail.com',
                'password' => Hash::make('Viagela6')
            ]);

            $role = Role::create(['name' => 'Amministratore']);

            $permissions = Permission::pluck('id','id')->all();

            $role->syncPermissions($permissions);

            $user->assignRole([$role->id]);
            $user2->assignRole([$role->id]);
        }
    }
