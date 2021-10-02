<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sails', function (Blueprint $table) {
            $table->id();
            $table->foreignId( 'ship_id' )->constrained( 'ships' )->onDelete( 'cascade' );
            $table->foreignId( 'destination_id' )->constrained( 'destinations' )->onDelete( 'cascade' );
            $table->json( 'crews' );
            $table->json( 'clients' );
            $table->json( 'metadata' )->nullable();
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
        Schema::dropIfExists('sails');
    }
}
