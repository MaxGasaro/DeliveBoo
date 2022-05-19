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

        $restaurants = User::with(['foods', 'typologies'])->take(10)->get();

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


    public function filter($filter) {
        
        
        $filter = explode(",", $filter);
        $restaurantArray = [];


        $restaurants = User::with(['typologies'])->get();

        foreach($filter as $filterX){
            foreach($restaurants as $restaurant) {
                foreach($restaurant->typologies as $type) {
                    if ($type->id == $filterX) {

                        if(!in_array($restaurant, $restaurantArray)){
                            $restaurantArray[] = $restaurant;
                        }
                    }
                }
            }
        }
        //devo trasformare l'array filter e devo creare un array di tutte le tipologie del ristorante,
        // devono essere entrambi due array key=> $value e usando !array_diff vedo se filter è contenuto nell'array delle tipologie

        foreach($restaurantArray as $restaurant) {
            if ($restaurant->image) {
                $restaurant->image = url('storage/'.$restaurant->image);
            } else {
                $restaurant->image = url('img/fallback_img.jpg');
            }
        };

        return response()->json(
            [
                'results' => $restaurantArray,
                'success'=> true,
            ]
        );

    }

    public function searchTypes($input = null){
        if($input != null){
            $new_str = preg_replace("/\s+/", "*", $input);
            $input = $new_str;
            $types = Typology::whereRaw("REPLACE(name, ' ' ,'') LIKE ?", $input.'%')->get();
            foreach($types as $type){
                $type['users'] = $type->users;
            }
        }
        return response()->json($types);
    }

    public function searchUsers($input = null) {
        if($input != null){
            $new_str = preg_replace("/\s+/", "*", $input);
            $input = $new_str;
            $users = User::whereRaw("REPLACE(activity, ' ' ,'') LIKE ?", '%'.$input.'%')->get();
            foreach($users as $user){
                $user->plates;
                $user->types;
            }
        }
        return response()->json($users);
    }

}
