<?php

use App\Typology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class TypologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = ['Vegetariano','Americano','Cinese','Giapponese','Thailandese',
                        'Messicano','Greco','Argentino','Healthy','Italiano','Sushi','Kebab','Poke','Vegano',
                        'Street Food','Piadina','Indiano','Pub','Sandwich','Bar','Venezuelano','Coreano',
                        'Gelato','Insalate','Hamburger','Pizzeria','Vino','Cocktail','Enoteche','Birre','Birrerria',
                        'Pollo','Centrifughe','Venezuelano','Frappe','Francese','Marocchino','Finger Food','Senza Glutine','Senza Lattosio','Altro'];

        foreach($typologies as $typology){
            $newtypology = new Typology ();
            $newtypology->name = $typology;
            $newtypology->slug = Str::slug($typology);
            $newtypology->save();
        }
    }
}
