<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path');
            $table->string('origem');
            $table->boolean('orcamento');
            $table->boolean('visivelCliente');
            $table->unsignedBigInteger('orcamento_id');
            $table->timestamps();

            $table->foreign('orcamento_id')->references('id')->on('orcamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arquivos');
    }
}
