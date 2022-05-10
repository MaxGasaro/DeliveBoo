<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Typology;
use Illuminate\Http\Request;

class TypologyController extends Controller
{
    public function index(){
        $typologies = Typology::all();

        return response()->json([
            'success' => true,
            'response' => $typologies
        ]);
    }
}
