<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Typology;
use Illuminate\Http\Request;

class TypologyController extends Controller
{
    public function index(){
        $typologies = Typology::all();

        if($typologies){
            return response()->json([
                'success' => true,
                'response' => $typologies
            ]);
        }else{
            return response()->json([
                'response' => 'nessuna tipologia trovata',
                'success' => false
            ]);
        }

        
    }
}
