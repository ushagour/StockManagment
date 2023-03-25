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
        $this->call([

            RoleSeeder::class,
            PermissionsSeeder::class,
            Permissions_RoleSeeder::class,
            UserSeeder::class,
            Role_UserSeeder::class,
            AssetsSeeder::class,
            TeamSeeder::class,
        ]);

    }
}
