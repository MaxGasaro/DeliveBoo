<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = new User();
        $newUser->owner = "Francesco Francini";
        $newUser->email = "lacantina99@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Cantina";
        $newUser->p_iva = "12345678912";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-cantina';
        $newUser->save();
        $newUser = new User();
        $newUser->owner = "Francesco Francini";
        $newUser->email = "lacantina99@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Cantina";
        $newUser->p_iva = "12345678912";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-cantina';
        $newUser->save();
        $newUser = new User();
        $newUser->owner = "Francesco Francini";
        $newUser->email = "lacantina99@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Cantina";
        $newUser->p_iva = "12345678912";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-cantina';
        $newUser->save();
        $newUser = new User();
        $newUser->owner = "Francesco Francini";
        $newUser->email = "lacantina99@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Cantina";
        $newUser->p_iva = "12345678912";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-cantina';
        $newUser->save();
        $newUser = new User();
        $newUser->owner = "Francesco Francini";
        $newUser->email = "lacantina99@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Cantina";
        $newUser->p_iva = "12345678912";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-cantina';
        $newUser->save();
        $newUser = new User();
        $newUser->owner = "Francesco Francini";
        $newUser->email = "lacantina99@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Cantina";
        $newUser->p_iva = "12345678912";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-cantina';
        $newUser->save();
    }
}
