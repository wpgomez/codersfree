<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogpageModeloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogpage_modelo', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('catalogpage_id');
            $table->unsignedBigInteger('modelo_id');

            $table->foreign('catalogpage_id')->references('id')->on('catalogpages');
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
        Schema::dropIfExists('catalogpage_modelo');
    }
}
