<?php

use App\Constants\PaymentsMethods;
use App\Constants\PaymentsStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $paymentMethods = array_map(fn(PaymentsMethods $payment) => $payment->value, PaymentsMethods::cases());
        $paymentStatus = array_map(fn(PaymentsStatus $status) => $status->value, PaymentsStatus::cases());

        Schema::create('transactions', function (Blueprint $table) use ($paymentMethods, $paymentStatus) {
            $table->id();

            $table->enum('method', $paymentMethods);
            $table->string('extern_id', 255)->nullable(false);

            $table->enum('status', $paymentStatus);

            $table->foreignId('plan_id')->references('id')->on('plans');
            $table->foreignId('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
