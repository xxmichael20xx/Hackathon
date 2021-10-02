<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DestinationSeeder extends Seeder
{
    const DESTINATIONS = 15;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach( range( 1, self::DESTINATIONS ) as $_ ) {
            Destination::create([
                'destination' => $faker->sentence( rand( 1, 3 ) ),
                'eta' => rand( 1, 61 ) . ' day(s)'
            ]);
        }
    }
}
