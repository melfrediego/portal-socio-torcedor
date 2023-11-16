<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 150);
            $table->string('email', 150);
            $table->string('telefone', 10);
            $table->string('uf', 2);
            $table->string('cidade', 80);
            $table->text('mensagem');
            $table->text('mensagem_resposta')->nullable();
            $table->enum('respondido', ['S', 'N'], 1)->nullable();
            $table->date('data_resposta')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
