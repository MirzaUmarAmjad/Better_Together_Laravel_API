<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sendBy')->unsigned()->nullable();
            $table->foreign('sendBy')->references('id')->on('users');
            $table->bigInteger('sendTo')->unsigned()->nullable();
            $table->foreign('sendTo')->references('id')->on('users');
            $table->longText('message')->nullable();
            $table->enum('status', ['sent', 'received'])->default('sent');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
