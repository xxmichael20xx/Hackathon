<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string( 'first_name' );
            $table->string( 'last_name' );
            $table->string( 'phone_number' )->nullable();
            $table->string( 'email_address' )->nullable()->unique();
            $table->dateTime( 'date_of_birth' );
            $table->string( 'gender' );
            $table->string( 'medical_details' )->nullable();
            $table->text( 'profile_image' )->nullable();
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
        Schema::dropIfExists('clients');
    }
}
