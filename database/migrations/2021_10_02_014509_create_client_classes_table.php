<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId( 'client_id' )->constrained( 'clients' )->onDelete( 'cascade' );
            $table->foreignId( 'class_id' )->constrained( 'classes' )->onDelete( 'cascade' );
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
        Schema::dropIfExists('client_classes');
    }
}
