<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Typology;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'owner' => ['nullable', 'string'],
            'address' => ['required','string', 'min:8'],
            'p_iva' => ['required','string', 'size:11'],
            'image' => ['nullable','mimes:jpg,jpeg,png,bmp,gif,svg,webp','max:2048'],
            'typologies' => ['nullable', 'exists:typologies,id']
          
        ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
   
        
        if(isset($data['image'])){
            $img_users = Storage::put('img_users', $data['image']);
            $data['image'] = $img_users;
        }else{
            $data['image'] = null;
        }

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'owner' => $data['owner'],
            'image' => $data['image'],
            'address' => $data['address'],
            'p_iva' => $data['p_iva'],
            
        ]);

        

        if(isset($data['typologies'])){
            $user->typologies()->sync($data['typologies']);
        }

        return $user;
    }

    public function showRegistrationForm()
    {
        $typologies = Typology::all();
        return view('auth.register', ["typologies" => $typologies]);
        
    }
}
