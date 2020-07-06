<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aluno_id');
            $table->foreign('aluno_id')->references('pessoa_id')->on('aluno')->onDelete('restrict');
            $table->integer('aulas_praticas')->unsigned()->nullable();
            $table->integer('aulas_teoricas')->unsigned()->nullable();
            $table->integer('aulas_realizadas_praticas')->unsigned()->nullable();
            $table->integer('aulas_realizadas_teoricas')->unsigned()->nullable();
            $table->date('data_contrato');
            $table->float('valor_contrato', 9, 2);
            $table->enum('status_contrato', ['Pendente', 'Pago', 'Concluido', 'Cancelado'])->default('Pendente');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda');
    }
}
