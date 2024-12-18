<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarcodeDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barcodeDetails = [
            ['value' => 'یک- رسیده به تولید' , 'type'=>'outProduct'],
            ['value' => 'دو- رسیده به تولید' , 'type'=>'outProduct'],
            ['value' => 'یک- رسیده به تولید' , 'type'=>'outProduct'],
            ['value' => 'یک- مواد' , 'type'=>'material'],
            ['value' => 'دو- مواد' , 'type'=>'material'],
            ['value' => 'سه- مواد' , 'type'=>'material'],
            ['value' => 'یک- ضایعات' , 'type'=>'wastage'],
            ['value' => 'دو- ضایعات' , 'type'=>'wastage'],
            ['value' => 'سه- ضایعات' , 'type'=>'wastage'],
        ];
        DB::table('barcode_details')->insert($barcodeDetails);
    }
}
