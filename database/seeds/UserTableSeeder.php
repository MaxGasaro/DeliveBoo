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
        $newUser->email = "lacantina55@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Pacchia";
        $newUser->p_iva = "12345678912";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-pacchia';
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

        $newUser = new User();
        $newUser->owner = "Pierluigi La Rocca";
        $newUser->email = "laroccapierluigi@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "Il Re Leone";
        $newUser->p_iva = "78945612374";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'il-re-leone-2';
        $newUser->save();

        $newUser = new User();
        $newUser->owner = "Francesco la Rocca";
        $newUser->email = "larocca@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Botte Buona";
        $newUser->p_iva = "85274196345";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-botte-buona';
        $newUser->save();

        $newUser = new User();
        $newUser->owner = "Alessandro Francini";
        $newUser->email = "ale999@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Fucagna";
        $newUser->p_iva = "95175345628";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-fucagna';
        $newUser->save();

        $newUser = new User();
        $newUser->owner = "Albero Francini";
        $newUser->email = "lacantina90@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "Il Paradiso dei Picentini";
        $newUser->p_iva = "36547897451";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'il-paradiso-dei-picentini';
        $newUser->save();

        $newUser = new User();
        $newUser->owner = "Carlo Francini";
        $newUser->email = "carlo@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Cantina 3";
        $newUser->p_iva = "95375142687";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-cantina-3';
        $newUser->save();

        $newUser = new User();
        $newUser->owner = "Giovanni Francini";
        $newUser->email = "giovanni99@gmail.com";
        $newUser->password = Hash::make('testtest');
        $newUser->name = "La Bella Napoli";
        $newUser->p_iva = "95478632174";
        $newUser->address = "Via nuova perla , 92";
        $newUser->slug = 'la-bella-napoli';
        $newUser->save();
    }
}
