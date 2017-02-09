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
            $t->integer('sub_id')->unsigned()->nullable();
            $t->foreign('sub_id')->references('id')->on('contents')->onDelete('cascade');
            $t->string('name', 300);
            $t->text('body');
            $t->string('url', 200);
            $t->enum('enabled', array(0, 1))->default(0);
            $t->integer('sort')->default(0);
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