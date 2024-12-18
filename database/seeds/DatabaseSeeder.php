<?php

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
        $this->call([
//          UserSeeder::class,
//          PermissionSeeder::class,
//          RoleSeeder::class,
//          CustomerSeeder::class,
//          BuildPhaseSeeder::class
            BarcodeDetailsSeeder::class
        ]);
    }
}
