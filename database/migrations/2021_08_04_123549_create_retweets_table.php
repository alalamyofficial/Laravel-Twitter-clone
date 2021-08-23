<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retweets', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            // $table->string('owner_tweet_id');
            // $table->string('user_id');
            // $table->unsignedBigInteger('source_tweet_id')->unsigned();
            // $table->unsignedBigInteger('tweet_id')->unsigned();
            // $table->tinyInteger('seen')->default(0);            $table->bigInteger('post_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('tweet_id')->unsigned()->index();

=======
            $table->integer('user_id');
            $table->integer('tweet_id');
            $table->integer('tweeted_id');
>>>>>>> 6e33710f9b18bab3940a45763fdb637c936e7b1d
            $table->timestamps();
        });

        // Schema::table('retweets', function($table)
        // {
        //     $table->foreign('source_tweet_id')->references('id')->on('tweets');
        //     $table->foreign('tweet_id')->references('id')->on('tweets');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retweets');
    }
}
