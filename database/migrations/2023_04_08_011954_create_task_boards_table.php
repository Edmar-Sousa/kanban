<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskBoardsTable extends Migration
{
    public function up()
    {
        Schema::create('task_boards', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('description');

            $table->foreignId('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('task_boards');
    }
}
