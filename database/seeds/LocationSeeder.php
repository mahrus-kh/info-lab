<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'location' => 'LAB A'
        ]);
        Location::create([
            'location' => 'LAB B'
        ]);
        Location::create([
            'location' => 'LAB C'
        ]);
        Location::create([
            'location' => 'LAB D'
        ]);
        Location::create([
            'location' => 'LAB E'
        ]);
        Location::create([
            'location' => 'LAB F'
        ]);
    }
}
