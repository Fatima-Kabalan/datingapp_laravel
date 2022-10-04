<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Favorites extends Migration
{
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {           
            $table->foreignId('favorite_id')->references('id')->on('users');           
            $table->foreignId('user_id')->references('id')->on('users');       
       });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
