<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) 
        {

            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->unsignedBigInteger('tweet_id')
                ->constrained()
                ->onDelete('cascade');

            $table->boolean('liked'); //0 or 1
            $table->timestamps();
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unique(['user_id','tweet_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
