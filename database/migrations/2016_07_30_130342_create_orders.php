<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $t){
            $t->increments('id');
            $t->integer('delivery_id')->unsigned()->nullable();
            $t->integer('payment_id')->unsigned()->nullable();
            $t->integer('status_id')->unsigned()->nullable();
            $t->integer('user_id')->unsigned()->nullable();
            $t->integer('currency_id')->unsigned()->nullable();
            $t->float('rate');
            $t->integer('discount')->default(0);
            $t->float('sum');
            $t->text('body');
        });
/*
        Schema::table('orders', function(Blueprint $t){
            $t->foreign('delivery_id')->references('id')->on('delivery')->onDelete('cascade');
            $t->foreign('payment_id')->references('id')->on('payment')->onDelete('cascade');
            $t->foreign('status_id')->references('id')->on('orders_status')->onDelete('cascade');
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $t->foreign('currency_id')->references('id')->on('currency')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
