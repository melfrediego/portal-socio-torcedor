<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('titulo');
            $table->text('descricao');
            $table->date('validade')->nullable();
            $table->decimal('valor', 6,2)->default(0);
            $table->decimal('valor_adesao', 6,2)->default(0);
            $table->boolean('ativo');
            $table->enum('tipo_assinatura', ['Anual', 'Mensal'])->nullable();
            $table->string('imagem_carteira_frente');
            $table->string('imagem_carteira_verso');


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
        Schema::dropIfExists('planos');
    }
}
