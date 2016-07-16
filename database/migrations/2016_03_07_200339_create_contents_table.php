<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function(Blueprint $t){
            $t->increments('id');
            $t->integer('sub_id');
            $t->string('title', 300);
            $t->string('keywords', 300);
            $t->string('description', 300);
            $t->string('name', 300);
            $t->text('body');
            $t->string('slug', 200);
            $t->boolean('enabled');
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
        Schema::drop('contents');
    }
}