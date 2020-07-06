<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrutor', function (Blueprint $table) {
            $table->unsignedInteger('funcionario_id')->primary();
            $table->foreign('funcionario_id')->references('pessoa_id')->on('funcionario')->onDelete('cascade');
            $table->string('matricula_curso_instrutor', 16);
            $table->string('numero_cnh', 16);
            $table->enum('categoria_cnh', ["ACC", "A", "AB", "B", "C", "D", "E"]);
            $table->date('primeira_cnh');
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
        Schema::dropIfExists('instrutor');
    }
}
