<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officers', function (Blueprint $table) {
            $table->id();
            $table->string( 'first_name' );
            $table->string( 'last_name' );
            $table->string( 'phone_number' );
            $table->string( 'email_address' )->nullable()->unique();
            $table->dateTime( 'date_of_birth' );
            $table->string( 'gender' );
            $table->text( 'profile_image' )->nullable();
            $table->foreignId( 'position_id' )->constrained( 'officer_positions' )->onDelete( 'cascade' );
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
        Schema::dropIfExists('officers');
    }
}
