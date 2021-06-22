<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogpages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('catalog_id')->nullable();
            $table->integer('number_page');
            $table->string('image_normal');
            $table->string('image_small');
            $table->integer('number_modelos');

            $table->foreign('catalog_id')->references('id')->on('catalogs');
            
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
        Schema::dropIfExists('catalogpages');
    }
}
