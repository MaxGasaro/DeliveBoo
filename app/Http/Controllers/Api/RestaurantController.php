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
       
        $typologies = $request->selected;
        if(!empty($typologies)){
            $ristorantiFiltrati = [];
            foreach($typologies as $typology){
                $myRestaurant = Typology::where('name', $typology)->first()->users()->get();

                foreach ($myRestaurant as $singleRestaurant) {
                    array_push($ristorantiFiltrati, $singleRestaurant );
                }
            }
            $finalRestaurant = [];
            $allReadyIn = [];
            $allTypologies = true;

            foreach($ristorantiFiltrati as $ristorante){
                $restaurantTypologyName = [];
                $restaurantTypologies = $ristorante->typologies()->get();
                foreach($restaurantTypologies as $restaurantTypology){
                    array_push($restaurantTypologyName, $restaurantTypology->name );
                }
                foreach($typologies as $typology){
                    if(!in_array($typology,$restaurantTypologyName )){
                        $allTypologies = false;
                    }
                }
                if($allTypologies){
                    if(!in_array($ristorante->id, $allReadyIn )){
                        array_push($finalRestaurant, $ristorante );
                        array_push($allReadyIn, $ristorante->id );
                    }
                }
                $allTypologies = true;
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
