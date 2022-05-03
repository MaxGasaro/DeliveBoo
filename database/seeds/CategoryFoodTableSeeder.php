<?php

use App\CategoryFood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CategoryFoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Antipasti','Primi','Secondi','Contorni','Dolci','Pizza','Bevande','Street Food','Fast Food'];

        foreach($categories as $category){
            $newCategory = new CategoryFood();
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category);
            $newCategory->save();
        }
    }
}
