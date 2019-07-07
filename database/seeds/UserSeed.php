<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'Ahashan Alam Sojib',
            'email'=>'ahashans@gmail.com',
            'password' => bcrypt('asdf1234')
        ]);
    }
}
