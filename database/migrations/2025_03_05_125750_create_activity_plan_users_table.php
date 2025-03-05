<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\Subscription;

return new class extends Migration
{
    public function up(): void
    {
        $statusSubscriptions = array_map(fn(Subscription $payment) => $payment->value, Subscription::cases());

        Schema::create('activity_plan_users', function (Blueprint $table) use ($statusSubscriptions) {
            $table->id();

            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('plan_id')->references('id')->on('plans');

            $table->dateTime('sign_date');
            $table->dateTime('expire_date')->nullable();
            $table->enum('status', $statusSubscriptions);

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('activity_plan_users');
    }
};
