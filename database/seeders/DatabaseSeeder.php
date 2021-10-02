<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call( PositionSeeder::class );
        $this->call( UserSeeder::class );
        $this->call( ShipSeeder::class );
        $this->call( ClassSeeder::class );
        $this->call( DestinationSeeder::class );
        $this->call( RouteSeeder::class );
    }
}
