<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensalidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero_mensalidade');

            $table->unsignedBigInteger('pedido_id');
            $table->foreign('pedido_id')
                ->references('id')
                ->on('pedidos');
                //->onDelete('cascade');
            $table->integer('charge_id')->nullable();
            $table->date('data_emissao');
            $table->date('data_vencimento');
            $table->date('data_pegamento')->nullable();
            $table->decimal('valor_cobrado', 6,2);
            $table->decimal('valor_pago', 6,2)->nullable();
            $table->string('status');
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
        Schema::dropIfExists('mensalidades');
    }
}
