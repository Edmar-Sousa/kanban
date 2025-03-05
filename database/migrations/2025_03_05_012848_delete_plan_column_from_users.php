<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['plan_id']);
            $table->dropColumn('plan_id');
        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('plan_id')
                ->nullable()
                ->default(1) // Plano gratis
                ->references('id')
                ->on('plans');
        });
    }
};
