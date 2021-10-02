<?php

namespace Database\Seeders;

use App\Models\Crew;
use App\Models\Officer;
use App\Models\OfficerPosition;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    const USERS = 40;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $role = "user";
        $positions = $this->officePositions();
        $genders = array( 'male', 'female' );

        foreach( range( 1, self::USERS ) as $_ ) {
            $f_name = $faker->firstName;
            $l_name = $faker->lastName;
            $name = $f_name . " " . $l_name;
            $email = $faker->safeEmail();
            $password = bcrypt( $email );
            $phone_number = $faker->tollFreePhoneNumber;
            $dob = $faker->dateTimeThisCentury->format( 'Y-m-d' );
            $gender = $genders[array_rand( $genders )];
            $position_id = $positions[array_rand( $positions )];

            $user = User::create( [
                'name' => $name,
                'email' => $email,
                'password' => $password
            ] );

            if ( $_ >= 10 ) $role = 'officer';
            if ( $_ >= 20 ) $role = 'captain';
            if ( $_ >= 30 ) $role = 'crew';

            $user_role = new UserRole();
            $user_role->user_id = $user->id;
            $user_role->user_role = $role;
            $user_role->save();

            if ( $role == 'officer' ) {
                Officer::create([
                    'first_name' => $f_name,
                    'last_name' => $l_name,
                    'phone_number' => $phone_number,
                    'email_address' => $email,
                    'date_of_birth' => $dob,
                    'gender' => $gender,
                    'position_id' => $position_id
                ]);
            }

            if ( $role == 'crew' ) {
                Crew::create([
                    'first_name' => $f_name,
                    'last_name' => $l_name,
                    'phone_number' => $phone_number,
                    'email_address' => $email,
                    'date_of_birth' => $dob,
                    'gender' => $gender
                ]);
            }

        }
    }

    public function officePositions() {
        $positions = OfficerPosition::all()->pluck( [ 'id' ] )->toArray();
        return $positions;
    }
}
