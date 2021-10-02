<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = config( 'types' );

        foreach( $classes as $class ) {
            Classes::create([
                'name' => $class[0],
                'price' => floatval( $class[1] ),
            ]);
        }
    }
}
