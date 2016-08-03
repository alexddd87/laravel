<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters', function(Blueprint $t){
            $t->increments('id');
            $t->integer('sub_id')->unsigned()->nullable();
            $t->foreign('sub_id')->references('id')->on('filters')->onDelete('cascade');
            $t->string('name', 300);
            $t->text('body');
            $t->string('url', 200);
            $t->boolean('active');
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
        Schema::drop('filters');
    }
}
