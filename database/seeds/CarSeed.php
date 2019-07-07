<?php

use App\Car;
use Illuminate\Database\Seeder;

class CarSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Car::create([
            'name'=>"Toyota Supra"
        ]);
        Car::create([
            'name'=>"Porsche 911"
        ]);
        Car::create([
            'name'=>"BMW Z5"
        ]);
        Car::create([
            'name'=>"Ford Mustang"
        ]);
    }
}
