<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSeo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function(Blueprint $t){
            $t->increments('id');
            $t->string('url');
            $t->string('title');
            $t->string('keywords');
            $t->text('description');
            $t->text('body');
            $t->enum('enabled', array(0, 1))->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seo');
    }
}
