<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function(Blueprint $t){
            $t->increments('id');
            $t->integer('sub_id')->unsigned()->nullable();
            $t->foreign('sub_id')->references('id')->on('contents')->onDelete('cascade');
            $t->integer('user_id')->unsigned()->nullable();
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $t->string('name', 300);
            $t->string('body');
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
        Schema::drop('comments');
    }
}
