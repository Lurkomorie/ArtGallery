<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userPage($id){
        $artistId = App\User::find($id)->id;
        return view('user.userPage', compact('artistId'));
    }

    public function index(){
        $artists = App\User::all();
        return view('user.index', compact('artists'));
    }

    public function getUpdateForm($id){
        $artist = App\User::find($id);
            return view('user.update', compact('artist'));
    }

    public function update(Request $request){
        $user = App\User::find($request->id);

        $user->name = $request -> name;
        $user->city = $request -> city;
        $user->country = $request -> country;
        $user->bio = $request -> bio;

        $user->save();

        $artistId = App\User::find($request->id)->id;

        return view('user.userPage', compact('artistId'));
    }

    public function remove($id){
        $user = App\User::find($id);
        $user -> deleted = 1;
        $user -> save();
        $message = ['text' => 'User remove', 'status' => 'DONE'];
        return view('status', compact('message'));
    }
    // public function
}
