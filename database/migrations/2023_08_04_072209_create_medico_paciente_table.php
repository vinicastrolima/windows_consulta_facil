<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicoPacienteTable extends Migration
{
    public function up()
    {
        Schema::create('medico_paciente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medico_paciente');
    }
}