<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelotallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelotallas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('modelo_id');
            $table->unsignedBigInteger('talla_id');
            
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->foreign('talla_id')->references('id')->on('tallas');

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
        Schema::dropIfExists('modelotallas');
    }
}
