<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recuperiamo tutti gli oggetti con model Food insieme al nodo di categories
        
        $foods = Food::where('user_id', Auth::user()->id)->get();
        $user = Auth::user();
        
        
        return view('admin.foods.index', compact('foods','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //passiamo tutti i category food
        $categories = Category::all();
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
        //validazione
        $request->validate(
            [
                'name' => 'required|min:2',
                'description' => 'required|min:10',
                'price' => 'required|numeric|min:0.05',
                'img' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
                'category_id' =>'nullable|exists:categories,id'
            ]
        );

        //acquisizione dei dati
        $data = $request->all();

        if(isset($data['img'])){
            $img_food = Storage::put('img_foods', $data['img']);
            $data['img'] = $img_food;
        }
        

        if (isset($request['visible'])){
            $data['visible'] = true;
        }else{
            $data['visible'] = false;
        }

        $data['user_id'] = Auth::id();

        //creazione dello slug
        $slug = Str::slug($data['name']);

        $counter = 1;
        while(Food::where('slug', $slug)->first()){
            $slug = Str::slug($data['name']). '-' . $counter;
            $counter++;
        }

        $data['slug'] = $slug;

        //istanziamo un nuovo oggetto
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
    public function show(Food $food)
    {
        return view('admin.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id) //senza dependency injection
    {
        //controllo se il food appartenga all'utente
        $food = Food::where('user_id', Auth::user()->id)->find($id);
        $categories = Category::all();
        if ($food) {
            return view('admin.foods.edit', compact('food','categories'));
        } else {
            abort(403,"Resource not found");
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //validazione
        $request->validate(
            [
                'name' => 'required|min:2',
                'description' => 'required|min:10',
                'price' => 'required|numeric|min:0.05',
                'img' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
                'category_id' =>'nullable|exists:categories,id'
            ]
        );

        //acquisizione dei dati
        $data = $request->all();

        if (isset($data['img'])) {

            if ($food->img) {
                Storage::delete($food->img);
            }

            $img_food = Storage::put('img_food', $data['img']);
            $data['img'] = $img_food;
        }
        
        if (isset($request['visible'])){
            $data['visible'] = true;
        }else{
            $data['visible'] = false;
        }

        $data['user_id'] = Auth::id();

        //controllo dello slug
        $slug = Str::slug($data['name']);
        
        if($food->slug != $slug){

            $counter = 1;
            while(Food::where('slug', $slug)->first()){
                $slug = Str::slug($data['name']). '-' . $counter;
                $counter++;
            }
            $data['slug'] = $slug;
        }

        //aggiorniamo l'oggetto
        $food->update($data);
        $food->save();

        return redirect()->route('admin.foods.show', ['food' => $food->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        if ($food->img) {
            Storage::delete($food->img);
        }
        $food->delete();
        return redirect()->route('admin.foods.index');
    }
}
