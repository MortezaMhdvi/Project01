<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelBetweenBarcodAndBarcodeDetailes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barcode_barcode_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barcode_id')->constrained('barcodes')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('barcode_details_id')->constrained('barcode_details')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->unique(['barcode_id', 'barcode_details_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_between_barcod_and_barcode_detailes');
    }
}
