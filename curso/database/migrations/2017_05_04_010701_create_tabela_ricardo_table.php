<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelaRicardoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabela_ricardo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('nome', 60);
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
        Schema::dropIfExists('tabela_ricardo');
    }
}