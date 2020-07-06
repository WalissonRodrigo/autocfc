<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_completo');
            $table->string('numero_cpf', 11);
            $table->date('nascimento');
            $table->string('email')->nullable();
            $table->string('telefone', 11)->nullable();
            $table->string('endereco')->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('nome_mae');
            $table->string('nome_pai');
            $table->string('numero_rg', 12);
            $table->date('data_expedicao_rg');
            $table->string('naturalidade');
            $table->string('nacionalidade', 100)->nullable();
            $table->enum('sexo', ['Masculino', 'Feminino']);
            $table->text('comentarios')->nullable();
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
        Schema::dropIfExists('pessoa');
    }
}
