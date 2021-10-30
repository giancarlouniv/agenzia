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
                'name' => 'Luciano',
                'email' => 'lucianofrenna@gmail.com',
                'password' => Hash::make('123456789')
            ]);

            $role = Role::create(['name' => 'Amministratore']);
            $role2 = Role::create(['name' => 'Utente']);

            $permissions = Permission::pluck('id','id')->all();

            $role->syncPermissions($permissions);
            $role2->syncPermissions($permissions);

            $user->assignRole([$role->id]);
            $user2->assignRole([$role2->id]);
        }
    }
