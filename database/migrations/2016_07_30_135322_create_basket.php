<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket', function(Blueprint $t){
            $t->increments('id');
            $t->integer('product_id')->unsigned()->nullable();
            $t->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $t->integer('price_id')->unsigned()->nullable();
            $t->foreign('price_id')->references('id')->on('prices')->onDelete('cascade');
            $t->integer('amount');
            $t->integer('user_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('basket');
    }
}
