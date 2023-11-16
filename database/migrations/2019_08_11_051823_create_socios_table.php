<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('cpf', 11);
            $table->string('matricula')->unique();
            $table->string('data_nascimento', 10);
            $table->binary('foto')->nullable();
            $table->string('sexo', 1);
            $table->string('estado_civil', 20);
            $table->string('email', 100);
            $table->string('senha', 30);
            $table->string('local_retirada_kit', 20);
            $table->string('cep', 9);
            $table->string('logradouro');
            $table->string('numero', 10);
            $table->string('complemento')->nullable();
            $table->string('bairro', 70);
            $table->string('estado', 50);
            $table->string('cidade', 100);
            $table->enum('leu_contrato', ['S', 'N'])->nullable();
            $table->enum('ativo', ['S', 'N'])->default('N');

            $table->unsignedBigInteger('plano_id');
            $table->foreign('plano_id')
                ->references('id')
                ->on('planos');
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
        Schema::dropIfExists('socios');
    }
}
