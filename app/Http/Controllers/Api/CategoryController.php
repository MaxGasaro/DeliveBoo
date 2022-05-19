<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::all();

        $categories->each(function($category) {
            if ($category->img) {
                $category->img = url('storage/'.$category->img);
            } else {
                $category->img = url('img/placeholder.svg');
            }
        });

        return response()->json(
            [
                'results' => $categories,
                'success' => true
            ]
        );
    }
}
