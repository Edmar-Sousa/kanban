<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_activity_plans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('plan_id')->references('id')->on('plans');

            $table->dateTime('sign_at');
            $table->dateTime('expire_at');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('user_activity_plans');
    }
};
