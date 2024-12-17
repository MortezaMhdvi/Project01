<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildPhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildPhase = [
            ['title'=>'print','order'=>1],
        ];
        DB::table('build_Phases')->insert($buildPhase);
    }
}
