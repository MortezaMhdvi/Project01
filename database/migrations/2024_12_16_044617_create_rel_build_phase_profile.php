<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelBuildPhaseProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_build_phase_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('build_phase_id')->constrained('build_phases')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('phase_profile_id')->constrained('phase_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unique(['build_phase_id', 'phase_profile_id']);
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
        Schema::dropIfExists('rel_build_phase_profile');
    }
}
