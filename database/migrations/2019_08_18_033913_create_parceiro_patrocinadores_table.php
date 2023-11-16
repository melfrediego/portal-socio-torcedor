<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParceiroPatrocinadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parceiro_patrocinadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_razao_social');
            $table->string('cpf_cnpj');
            $table->string('email');
            $table->string('site')->nullable();
            $table->boolean('patrocinador')->nullable();
            $table->boolean('parceiro')->nullable();
            $table->string('responsavel_nome')->nullable();
            $table->string('responsavel_email')->nullable();
            $table->string('responsavel_telefone')->nullable();
            $table->string('logo');
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
        Schema::dropIfExists('parceiro_patrocinadores');
    }
}
