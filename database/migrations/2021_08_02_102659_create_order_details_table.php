<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->string('rowId');
            $table->unsignedBigInteger('producto_id');
            $table->string('name');
            $table->integer('qty');
            $table->float('price');
            $table->float('weight');
            $table->string('modelo');
            $table->unsignedBigInteger('modelo_id');
            $table->string('color');
            $table->unsignedBigInteger('color_id');
            $table->string('image');
            $table->string('talla');
            $table->unsignedBigInteger('talla_id');
            $table->string('producto_code');
            $table->float('discount');
            $table->float('tax');
            $table->float('subtotal');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->foreign('color_id')->references('id')->on('colors');
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
        Schema::dropIfExists('order_details');
    }
}
