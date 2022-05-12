<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use SebastianBergmann\Environment\Console;

use function GuzzleHttp\Promise\each;

class RestaurantController extends Controller
{
    public function index() {

        $restaurants = User::with(['foods', 'typologies'])->take(10);

        $restaurants->each(function($restaurant) {
            if ($restaurant->image) {
                $restaurant->image = url('storage/'.$restaurant->image);
            } else {
                $restaurant->image = url('img/fallback_img.jpg');
            }
        });

        return response()->json(
            [
                'results' => $restaurants,
                'success' => true
            ]
        );
    }

    public function show($slug) {

        $restaurant = User::where('slug', $slug)->with(['foods', 'typologies'])->first();

        if ($restaurant->image) {
            $restaurant->image = url('storage/'.$restaurant->image);
        } else {
            $restaurant->image = url('img/fallback_img.jpg');
        }

        if ($restaurant) {
            return response()->json(
                [
                    'result' => $restaurant,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'result' => 'Nessun risultato trovato',
                    'success' => false
                ]
            );
        }
    }


    public function filter($slug){
        $typologySelected = [];
        $typologySelected[] = $slug;
        
        $restaurants = User::with(['foods', 'typologies'])->get();
        foreach ($restaurants->typologies as $typology){
            foreach ($typologySelected as $select) {
/*                 $filteredRestaurants = User::with(['foods', 'typologies'])->where($typology->pivot->typology_id, $select)->get();
 */            } 
        }
        

        return $restaurants;


    }

}
