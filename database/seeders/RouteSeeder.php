<?php

namespace Database\Seeders;

use App\Models\Route;
use App\Models\Destination;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RouteSeeder extends Seeder
{
    const ROUTES = 35;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $destinations = $this->destinations();
        $types = config( 'types' );

        foreach( range( 1, self::ROUTES ) as $_ ) {
            $destination_id = $destinations[array_rand( $destinations )];
            $route_type = $types[array_rand( $types )][0];
            
            Route::create([
                'destination_id' => $destination_id,
                'route_type' => $route_type
            ]);
        }
    }

    public function destinations() {
        $destinations = Destination::all()->pluck( [ 'id' ] )->toArray();
        return $destinations;
    }
}
