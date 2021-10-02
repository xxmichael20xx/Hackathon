<?php

namespace Database\Seeders;

use App\Models\OfficerPosition;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = array( 'clerk', 'counter', 'crew', 'cook' );

        foreach( $positions as $position ) {
            OfficerPosition::create([
                'position' => $position
            ]);
        }
    }
}
