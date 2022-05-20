<?php

use App\Food;
use Illuminate\Database\Seeder;

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
        $slug = ['classic-bbq','volcano','big-bacon', 'takaeshita-street','satrincha-box', 'margherita','diavola','salsiccia','4-stagioni'];
        $price = [10,12,8,7.5,5,9,7,4,6,10];
        $categoria = [1,2,3,4,5,6,7,8,9];
        
        
        for($i=1;$i<13; $i++){
            for($j=0 ; $j<count($name);$j++){
                $food = new Food();
                $food->name = $name[$j];
                $food->slug = $slug[$j];
                $food->description = $name[$j];
                $food->price = $price[$j];
                $food->visible = true;
                $food->user_id = $i;
                $food->category_id = rand(1,9);
                $food->save();
            }
        }


        
    }
}
