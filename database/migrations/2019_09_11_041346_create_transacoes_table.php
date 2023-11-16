<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('charge_id');
            $table->string('status');
            $table->string('payment_method')->nullable();

            //Se Boleto
            $table->string('banking_billet_barcode')->nullable();
            $table->string('banking_billet_link')->nullable();
            $table->string('banking_billet_link_pdf')->nullable();
            $table->date('banking_billet_expire_at')->nullable();

            //Costumer ID sera o socio
            $table->unsignedBigInteger('socio_id');
            $table->foreign('socio_id')
                ->references('id')
                ->on('socios')->nullable();

            //Mensalidade Id
            $table->unsignedBigInteger('mensalidade_id');
            $table->foreign('mensalidade_id')
                ->references('id')
                ->on('mensalidades')->nullable();
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
        Schema::dropIfExists('transacoes');
    }
}
