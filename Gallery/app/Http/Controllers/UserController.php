<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

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

    public function aindex(){
        $artists = App\User::where('activated','=','0')->get();
        return view('user.activate', compact('artists'));
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

    public function getAddAvatarForm($id){
        $artist = App\User::find($id);
        return view('user.addAvatar', compact('artist'));
    }

    public function addAvatar(Request $request){
        $user = App\User::find($request->id);
        $this->validate($request, ['image' => 'required|image']);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().'_' . $file->getClientOriginalName();
            $file->move(storage_path('app/public/images'), $name);
            $user->avatar = 'storage/images/' . $name;
            $user->save();
        }
        $message = ['text' => 'Avatar adding', 'status' => 'DONE'];
        return view('status', compact('message'));
    }

    public function findArtist(Request $request){
        $search = "%{$request->search}%";
        $artists = App\User::where($request->column, 'like', $search)->get();
        return view('user.index', compact('artists'));
    }

    public function activate($id){
        $user = App\User::find($id);
        $user->activated = true;
        $user->save();
        $message = ['text' => 'User activation', 'status' => 'DONE'];
        return view('status', compact('message'));
    }

    public function getSetRole($id){
        $artist = App\User::find($id);
        return view('user.setRole', compact('artist'));
    }

    public function setRole(Request $request){
        $user = App\User::find($request->id);
        $user -> role = $request -> role;
        $user -> save();
        $message = ['text' => 'Role set', 'status' => 'DONE'];
        return view('status', compact('message'));
    }

    // public function
}
