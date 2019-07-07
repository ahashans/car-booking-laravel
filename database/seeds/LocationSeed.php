<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Location::create([
            'name'=>"Dhaka"
        ]);
        Location::create([
            'name'=>"Sylhet"
        ]);
        Location::create([
            'name'=>"Barisal"
        ]);
        Location::create([
            'name'=>"Chittagong"
        ]);
        Location::create([
            'name'=>"Khulna"
        ]);
        Location::create([
            'name'=>"Rajshahi"
        ]);
    }
}
