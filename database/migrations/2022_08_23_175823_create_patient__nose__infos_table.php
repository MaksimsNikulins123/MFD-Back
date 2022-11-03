<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientNoseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient__nose__infos', function (Blueprint $table) {
            $table->id();
            $table->string('external_form');
            $table->string('mucous_membrane');
            $table->string('nasal_passages');
            $table->string('separations');
            $table->string('nasal_septum');
            $table->string('breathing_through_the_nose');
            $table->foreignId('patient_id');
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
        Schema::dropIfExists('patient__nose__infos');
    }
}
