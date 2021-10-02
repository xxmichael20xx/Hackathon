<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crews', function (Blueprint $table) {
            $table->id();
            $table->string( 'first_name' );
            $table->string( 'last_name' );
            $table->string( 'phone_number' );
            $table->string( 'email_address' )->unique();
            $table->dateTime( 'date_of_birth' );
            $table->string( 'gender' );
            $table->string( 'profile_image' )->nullable();
            $table->integer( 'duty_id' )->nullable();
            $table->string( 'status' )->nullable()->default( 'NULL' );
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
        Schema::dropIfExists('crews');
    }
}
