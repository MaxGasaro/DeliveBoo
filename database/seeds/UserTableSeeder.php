<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        /* $path = storage_path('app/public/img_users'); */

        for ($i=0; $i < 10; $i++) { 
            $newUser = new User();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make('testtest');
            $newUser->name = $faker->company();
            $newUser->owner = $faker->name();
            $newUser->p_iva = $faker->randomNumber(9, true);
            $newUser->image = $faker->imageUrl(640, 480, $newUser->name, true);
            $newUser->address = $faker->address();
            $newUser->slug = Str::slug($newUser->name);

            /* $newUser->image = Storage::put('img_users', $faker->image($path, 640, 480)); */
            /* $faker->imageUrl(640, 480, 'test', true); */

            $newUser->save();

            $pivotData = [ //inserisco 3 tipologie randomiche per ogni utente nella tabella pivot
                [
                    'typology_id' => rand(1, 41),
                    'user_id' => $newUser->id
                ],
                [
                    'typology_id' => rand(1, 41),
                    'user_id' => $newUser->id
                ],
                [
                    'typology_id' => rand(1, 41),
                    'user_id' => $newUser->id
                    ]
                ];
                
            $newUser->typologies()->sync($pivotData);


            //SOLUZIONE ALTERNATIVA
            /* DB::table('typology_user')->insert([
                [
                    'typology_id' => rand(1, 41),
                    'user_id' => $newUser->id
                ],
                [
                    'typology_id' => rand(1, 41),
                    'user_id' => $newUser->id
                ],
                [
                    'typology_id' => rand(1, 41),
                    'user_id' => $newUser->id
                ]
            ]); */
        }
        
    }
}
