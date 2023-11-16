<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('socio_id');
            $table->foreign('socio_id')
                ->references('id')
                ->on('socios');

            $table->unsignedBigInteger('plano_id');
            $table->foreign('plano_id')
                ->references('id')
                ->on('planos');

            $table->enum('forma_pagamento', ['card', 'billet']); //Cartao Credito, Boleto

            $table->decimal('valor_parcela', 6,2)->default(0);

            $table->decimal('valor_total', 6,2)->default(0);

            $table->integer('qtd_parcela');

            $table->decimal('desconto', 6,2)->default(0)->nullable();
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
        Schema::dropIfExists('pedidos');
    }
}
