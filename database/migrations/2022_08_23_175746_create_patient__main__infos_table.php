<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientMainInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient__main__infos', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_registration');
            $table->string('name');
            $table->string('surname');
            $table->integer('personal_code');
            $table->string('complaints_and_anamnesis');
            $table->string('adjacent_deseases');
            $table->string('drug_intolerance_allergies');
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
        Schema::dropIfExists('patient__main__infos');
    }
}
