<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $t){
            $t->increments('id');
            $t->string('code');
            $t->string('name', 300);
            $t->text('body');
            $t->string('url', 200);
            $t->enum('enabled', array(0, 1))->default(0);
            $t->integer('sort');
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
        Schema::drop('products');
    }
}
