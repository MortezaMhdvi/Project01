<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildPhaseOrParameter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_phase_or_parameter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('build_phase_id')->constrained('build_phases');
            $table->foreignId('parameter_id')->constrained('parameters');

            $table->unique(['build_phase_id', 'parameter_id']);
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
        Schema::dropIfExists('build_phase_or_parameter');
    }
}
