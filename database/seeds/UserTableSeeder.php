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
        $newUser->owner = "Antonio Franco";
        $newUser->email = "lariviera10@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Riviera";
        $newUser->p_iva = "22345678912";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-riviera';
        $newUser->save();
        $newUser = new User();
        $newUser->owner = "Piero Armenti";
        $newUser->email = "lalocanda@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Locanda";
        $newUser->p_iva = "12555678912";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-locanda';
        $newUser->save();
        $newUser = new User();
        $newUser->owner = "Damiano Torrisi";
        $newUser->email = "cantinetta@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "Cantinetta";
        $newUser->p_iva = "12345634912";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'cantinetta';
        $newUser->save();
        $newUser = new User();
        $newUser->owner = "Paolo Antonio";
        $newUser->email = "sarchiapone@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "Sarchiapone";
        $newUser->p_iva = "12345678944";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'sarchiapone';
        $newUser->save();
        $newUser = new User();
        $newUser->owner = "Guido Luce";
        $newUser->email = "labaita@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Baita";
        $newUser->p_iva = "12345673422";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-baita';
        $newUser->save();
    }
}
