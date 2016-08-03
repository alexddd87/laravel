<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCatalog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category', function(Blueprint $t){
            $t->increments('id');
            $t->integer('product_id')->unsigned();
            $t->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $t->integer('category_id')->unsigned();
            $t->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_category');
    }
}
