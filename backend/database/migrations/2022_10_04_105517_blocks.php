<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blocks extends Migration
{
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {          
            $table->foreignId('blocked_id')->references('id')->on('users');     
            $table->foreignId('blocker_id')->references('id')->on('users');        
        });
    }

    public function down()
    {
        Schema::dropIfExists('blocks');
    }
}
