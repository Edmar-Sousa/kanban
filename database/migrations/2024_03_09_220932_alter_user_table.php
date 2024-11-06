<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTable extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('document', 14)->nullable()->default(null);
            $table->string('phone', 15)->nullable()->default(null);
            $table->string('customer', 20)->nullable()->default(null);
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['document', 'phone', 'customer']);
        });
    }
}
