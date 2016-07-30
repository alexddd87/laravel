<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_product', function(Blueprint $t){
            $t->increments('id');
            $t->integer('product_id')->unsigned();
            $t->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $t->integer('order_id')->unsigned();
            $t->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders_product');
    }
}
