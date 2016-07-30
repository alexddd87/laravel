<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function(Blueprint $t){
            $t->increments('id');
            $t->integer('product_id')->unsigned()->nullable();
            $t->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $t->string('code');
            $t->float('price');
            $t->integer('discount');
            $t->integer('stock');
            $t->boolean('active');
            $t->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prices');
    }
}
