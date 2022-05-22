<?php

use App\Food;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Classic BBQ','Volcano','Big Bacon', 'Takaeshita street','Satrincha box', 'Margherita','Diavola','Salsiccia','4 stagioni'];

        $faker = Faker\Factory::create();
        
        for($i=1;$i<10; $i++){ //per ogni utente creato dall'UserTableSeeder, associo i seguenti cibi
            for($j=0 ; $j<count($name);$j++){ //scorro per ogni cibo
                $food = new Food();
                $food->name = $name[$j];
                $food->slug = Str::slug($food->name);
                $food->description = $faker->text();
                $food->price = number_format($faker->randomFloat(1, 3, 20), 2);
                $food->visible = true;
                $food->user_id = $i;
                $food->category_id = rand(1,9);
                $food->save();
            }
        }


        
    }
}
