<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=[
            ['role_id'=>'1','name'=>'morteza','family'=>'akbari','username'=>'Morteza.m','password'=>'123456789'],
        ];
        DB::table('users')->insert($user);
    }
}
