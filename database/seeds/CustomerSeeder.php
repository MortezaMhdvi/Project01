<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer=[
            ['name'=>'zahra','mobile'=>'09135556969','code'=>'112288'],
            ['name'=>'hasan','mobile'=>'09137778899','code'=>'998877'],
            ['name'=>'mina','mobile'=>'09138885511','code'=>'445566'],
            ['name'=>'ali','mobile'=>'09137774411','code'=>'336699'],
        ];
        DB::table('customers')->insert($customer);
    }
}
