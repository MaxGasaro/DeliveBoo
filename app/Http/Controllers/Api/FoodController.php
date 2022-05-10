<?php

namespace App\Http\Controllers\Api;

use App\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
       //richiamo tutti i foods, gestendo anche le categorie e l'user
       $foods = Food::where('user_id', $user_id)->with(['category', 'users'])->get();

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

    public function show($user_id, $slug)
    {
        $food = Food::where(['user_id' => $user_id, 'slug' => $slug])->with( ['category', 'users'])->first();
        
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
    }

    
}
