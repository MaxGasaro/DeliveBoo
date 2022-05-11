<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('typologies', 'Api\TypologyController@index');

// /api/restaurants
Route::get('/restaurants', 'Api\RestaurantController@index');

// /api/restaurants/*
Route::get('/restaurants/{slug}', 'Api\RestaurantController@show');

Route::get('/foods/{slug}', 'Api\FoodController@index');
Route::get('/foods/{slug}/{slug_food}', 'Api\FoodController@show');
