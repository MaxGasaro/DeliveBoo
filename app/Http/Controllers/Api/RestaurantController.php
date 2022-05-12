<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Typology;
use App\User;
use Illuminate\Http\Request;
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


    public function filter(Request $request){
        $restaurantToFind = $request->RestaurantToFind;

        $typologies = json_decode($request->selected);
        if(!empty($typologies)){
            $finalRestaurant = [];
            foreach($typologies as $typology){
                $myRestaurant = Typology::where('name', $typology)->first()->users()->get();

                foreach ($myRestaurant as $singleRestaurant) {
                    $typologies = $singleRestaurant->typologies()->get();
                    $singleRestaurant->typologies = $typologies;
                    array_search($singleRestaurant, $finalRestaurant);
                    array_push($finalRestaurant, $singleRestaurant );
                }     
            }

        }else{
            $finalRestaurant =  User::with(['foods', 'typologies'])->take(10)->get();
        }
        
        return response()->json(
            [
                'results' => $finalRestaurant,
                'success' => true
            ]
        );

    }

}
