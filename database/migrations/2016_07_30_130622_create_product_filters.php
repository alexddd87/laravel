<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFilters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_filter', function(Blueprint $t){
            $t->increments('id');
            $t->integer('product_id')->unsigned();
            $t->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $t->integer('filter_id')->unsigned();
            $t->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_filter');
    }
}
