<?php

namespace App\Http\Controllers\Api;

use App\Food;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
       //richiamo tutti i foods, gestendo anche le categorie e l'user
       $user = User::where('slug', $slug)->first();
       $foods = Food::where('user_id', $user->id)->with(['category', 'user','orders'])->get();

       //do una path assoluta alle immagini
       foreach($foods as $food){
           if ($food->img) {
               $food->img = url('storage/'.$food->img);
           } else {
               $food->img = url('img/fallback_img.jpg');
           }
       }
       //ritorno un file Json 
       return response()->json(
           [
               'result' => $foods,
               'success' => true
           ]
       );
    }

    /* public function show($slug, $slug_food)
    {
        $user = User::where('slug', $slug)->first();
        $food = Food::where(['user_id' => $user->id, 'slug' => $slug_food])->with( ['category', 'users'])->first();
        
        if ($food->img) {
            $food->img = url('storage/'.$food->img);
        } else {
            $food->img = url('img/fallback_img.jpg');
        }

        if ($food){
            return response()-> json(
                [
                    'result' => $food,
                    'success' => true
                ],
            );
        }else{
            return response()->json(
                [
                    'result' => 'Nessun risultato trovato',
                    'success' => false
                ]
            );
        }
    } */

    
}
