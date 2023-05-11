<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Plans;

class AlterUserTableAddPlanIdColumn extends Migration
{

    public function up()
    {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->foreignId( 'plan_id' )
                  ->nullable()
                  ->default( 1 ) // Plano gratis
                  ->references( 'id' )
                  ->on( 'plans' );
        } );
    }


    public function down()
    {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->dropForeign( 'plan_id' );
        } );
    }
}
