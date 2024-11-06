<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanRulesTable extends Migration
{

    public function up()
    {
        Schema::create('plan_rules', function (Blueprint $table) {
            $table->id();

            $table->integer('limit_boards');
            $table->integer('limit_users');
            $table->integer('limit_reports');
            $table->foreignId('plan_id')->nullable()->references('id')->on('plans');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plan_rules');
    }
}
