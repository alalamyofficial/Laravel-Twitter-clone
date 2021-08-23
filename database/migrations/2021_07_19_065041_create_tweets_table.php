<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('image')->nullable();
            $table->text('body');
<<<<<<< HEAD
            $table->integer('owner_tweet_id')->nullable();
            $table->integer('original_tweet')->nullable();
            $table->boolean('retweet')->default(false);
=======
            // $table->text('bookmark')->default(0);
>>>>>>> 6e33710f9b18bab3940a45763fdb637c936e7b1d
            $table->timestamps();

            $table->foreign("user_id")->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
