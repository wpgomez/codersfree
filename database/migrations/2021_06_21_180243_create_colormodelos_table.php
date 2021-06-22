<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColormodelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colormodelos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('modelo_id');
            $table->unsignedBigInteger('color_id');
            
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->foreign('color_id')->references('id')->on('colors');
            
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
        Schema::dropIfExists('colormodelos');
    }
}
