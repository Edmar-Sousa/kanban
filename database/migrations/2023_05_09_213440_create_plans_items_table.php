<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansItemsTable extends Migration
{

    public function up()
    {
        Schema::create('plans_items', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->foreignId('plan_id')->references('id')->on('plans')->delete('cascade');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('plans_items');
    }
}
