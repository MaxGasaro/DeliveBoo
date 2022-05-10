<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;

class RestaurantController extends Controller
{
    public function index() {

        $restaurants = User::with(['foods', 'typologies'])->get();

        return response()->json(
            [
                'results' => $restaurants,
                'success' => true
            ]
        );
    }

    public function show($id) {

        $restaurant = User::where('id', $id)->with(['foods', 'typologies'])->first();

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
}
