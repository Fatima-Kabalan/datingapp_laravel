<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chats extends Migration
{
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {            
            $table->foreignId('sender_id')->references('id')->on('users');           
            $table->foreignId('recipient_id')->references('id')->on('users');        
            $table->string('message'); 
            $table->time('time_sent');      
        });
    }

    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
