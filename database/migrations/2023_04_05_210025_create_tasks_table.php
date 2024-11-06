<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string('title', 100);
            $table->string('description');
            $table->tinyInteger('state');  // 1 - A Fazer  2 - Fazendo  3 - Concluido

            $table->foreignId('taskboard_id')->references('id')->on('task_boards')->onDelete('cascade');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
