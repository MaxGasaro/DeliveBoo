<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       $user = Auth::user();
       $typologies = Typology::all();
       return view('admin.user.edit', compact('user','typologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['exists:user,email'],
            'new_password' => [ 'nullable', 'string', 'min:8', 'confirmed'],
            'owner' => ['nullable', 'string'],
            'address' => ['required','string', 'min:8'],
            'p_iva' => ['exists:user,p_iva'],
            'image' => ['nullable','mimes:jpg,jpeg,png,bmp,gif,svg,webp','max:2048'],
            'typologies' => ['required', 'exists:typologies,id']
        ]);
          
        $data = $request->all();

        if (isset($data['image'])) {

            if ($user->image) {
                Storage::delete($user->image);
            }

            $img_user = Storage::put('img_users', $data['image']);
            $data['image'] = $img_user;
        }

        if ($data['new_password']) {
            $new_password = Hash::make($data['new_password']);
            $data['password'] = $new_password;
        }

        
        $user->update($data);
        if(isset($data['typologies'])){
            $user->typologies()->sync($data['typologies']);
        }
        return redirect()->route('admin.home')->with('message', 'Profile updated with success');
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
