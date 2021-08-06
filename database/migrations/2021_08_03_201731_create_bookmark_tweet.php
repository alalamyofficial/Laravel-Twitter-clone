<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookmarkTweet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmark_tweet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tweet_id')->unsigned();
            $table->integer('user_id');
            $table->foreign('tweet_id')
                ->references('id')->on('tweets')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmark_tweet');
    }
}
