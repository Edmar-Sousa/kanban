<?php

use App\Models\Notification;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            $table->foreignId( 'destination_user' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
            $table->foreignId( 'source_user' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' );

            $table->string('message')->nullable();
            $table->tinyInteger('type')->default(Notification::TYPE_SYSTEM);

            $table->boolean( 'visible' )->default( false );

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
        Schema::dropIfExists('notifications');
    }
}
