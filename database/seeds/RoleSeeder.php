<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=[
            ['name'=>'super-admin','guard_name'=>'web']

        ];
        DB::table('roles')->insert($role);
    }
}
