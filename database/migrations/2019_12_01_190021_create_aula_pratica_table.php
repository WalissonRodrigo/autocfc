<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulaPraticaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_pratica', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aluno_id');
            $table->foreign('aluno_id')->references('pessoa_id')->on('aluno')->onDelete('restrict');
            $table->unsignedInteger('instrutor_id');
            $table->foreign('instrutor_id')->references('funcionario_id')->on('instrutor')->onDelete('restrict');
            $table->unsignedInteger('veiculo_id');
            $table->foreign('veiculo_id')->references('id')->on('veiculo')->onDelete('restrict');
            $table->date('data_aula')->index();
            $table->time('hora_aula');
            $table->boolean('realizado')->default(false);
            $table->timestamps();
            $table->unique(['aluno_id', 'instrutor_id', 'veiculo_id', 'data_aula', 'hora_aula'], 'aula_pratica_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aula_pratica');
    }
}
