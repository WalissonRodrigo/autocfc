<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulaTeoricaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_teorica', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aluno_id');
            $table->foreign('aluno_id')->references('pessoa_id')->on('aluno')->onDelete('cascade');
            $table->unsignedInteger('instrutor_id');
            $table->foreign('instrutor_id')->references('funcionario_id')->on('instrutor')->onDelete('cascade');
            $table->unsignedInteger('sala_id');
            $table->foreign('sala_id')->references('id')->on('sala')->onDelete('cascade');
            $table->date('data_aula')->index();
            $table->time('hora_aula');
            $table->boolean('realizado')->default(false);
            $table->timestamps();
            $table->unique(['aluno_id', 'data_aula', 'hora_aula'], 'aula_teorica_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aula_teorica');
    }
}
