<?php

namespace App\Http\Controllers\Admin;

use App\CategoryFood;
use App\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::with(['categories'])->get();
        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryFood::all();
        return view('admin.foods.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $request->validate(
            [
                'name' => 'required|min:2',
                'description' => 'required|min:10',
                'price' => 'required|numeric|min:0.05',
                'img' => 'nullable|mimes:jpeg,png,bmp,gif,svg,webp|max:2048'
            ]
        );

        $data = $request->all();

        if (isset($request['visible'])){
            $data['visible'] = true;
        }else{
            $data['visible'] = false;
        }

        $data['user_id'] = Auth::id();
        $slug = Str::slug($data['name']);

        $counter = 1;
        while(Food::where('slug', $slug)->first()){
            $slug = Str::slug($data['name']). '-' . $counter;
            $counter++;
        }

        $data['slug'] = $slug;

        $food = new Food();

        $food-> fill($data);

        $food->save();

        return redirect()->route('admin.foods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
