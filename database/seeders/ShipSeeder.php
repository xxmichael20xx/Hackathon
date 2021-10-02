<?php

namespace Database\Seeders;

use App\Models\Ship;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ShipSeeder extends Seeder
{
    const SHIPS = 10;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $captains = $this->getCaptains();

        foreach( range( 1, self::SHIPS ) as $_ ) {
            $name = "Ship " . $faker->sentence( rand( 1, 5 ) );
            $max_clients = rand( 300, 600 );
            $captain_id = $captains[array_rand( $captains )];
            
            Ship::create([
                'name' => $name,
                'max_clients' => $max_clients,
                'captain_id' => $captain_id
            ]);
        }
    }

    public function getCaptains() {
        $userRoles = UserRole::where( 'user_role', 'captain' )->get()->pluck( [ 'id' ] )->toArray();
        return $userRoles;
    }
}
