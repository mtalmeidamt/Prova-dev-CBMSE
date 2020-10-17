<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('pessoa_id');
            $table->unsignedBigInteger('tipos_contatos_id');
            $table->string('contato');
            $table->timestamps();

            $table->foreign('pessoa_id')->references('id')->on('pessoas');

            $table->foreign('tipos_contatos_id')->references('id')->on('tipos_contatos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contatos');
    }
}
