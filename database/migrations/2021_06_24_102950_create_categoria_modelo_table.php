<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaModeloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_modelo', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('modelo_id');

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('modelo_id')->references('id')->on('modelos');

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
        Schema::dropIfExists('categoria_modelo');
    }
}
