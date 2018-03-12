<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('like', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('like_id')->unsigned();

            $table->primary(['user_id', 'like_id']);


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('like_id')->references('id')->on('chusqers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like');
    }
}
