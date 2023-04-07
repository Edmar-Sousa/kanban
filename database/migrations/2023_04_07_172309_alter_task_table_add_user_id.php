<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTaskTableAddUserId extends Migration
{
    
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users');
        });
    }

    
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });
    }
}
