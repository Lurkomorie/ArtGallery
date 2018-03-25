<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class DrawingController extends Controller
{

    public function index(){
        $drawings = App\Drawing::inRandomOrder()->sortable()->paginate(15);
        return view('welcome', compact('drawings'));
    }

    public function getCreateForm(){
        return view('draw.create');
    }

    public function createNew(Request $request){


        $drawing = new App\Drawing();
        $artistId = \Auth::user()->id;

        $drawing->artistId = $artistId;
        $drawing->title = $request->title;
        $drawing->city = $request->city;
        $drawing->country = $request->country;
        $drawing->date = $request->date;
        $drawing->genre = $request->genre;
        $drawing->technology = $request->technology;
        $drawing->size = $request->sizeOne . ' X ' . $request->sizeTwo . ' ' . $request->unit;
        $drawing->status = $request->status;
        $drawing->price = $request->price;
        $this->validate($request, ['image' => 'required|image']);


        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().'_' . $file->getClientOriginalName();
            $file->move(storage_path('app/public/images'), $name);
            $drawing->picture = 'storage/images/' . $name;
        }

        $drawing->save();
        $message = ['text' => 'Drawing creating', 'status' => 'DONE'];
        return view('status', compact('message'));
    }


    public function getUpdateForm($id){
        $drawing = App\Drawing::find($id);
        return view('draw.update', compact('drawing'));
    }

    public function update(Request $request){


        $drawing = App\Drawing::find($request->id);

        $drawing->title = $request->title;
        $drawing->city = $request->city;
        $drawing->country = $request->country;
        $drawing->date = $request->date;
        $drawing->genre = $request->genre;
        $drawing->technology = $request->technology;
        $drawing->size = $request->sizeOne . ' X ' . $request->sizeTwo . ' ' . $request->unit;
        $drawing->status = $request->status;
        $drawing->price = $request->price;


        $drawing->save();
        $message = ['text' => 'Drawing updating', 'status' => 'DONE'];
        return view('status',compact('message'));
    }
    public function remove($id){
        $drawing = App\Drawing::find($id);
        $drawing->removed = 1;
        $drawing->save();
        $message = ['text' => 'Drawing removing', 'status' => 'DONE'];
        return view('status', compact('message'));
    }

    public function find(Request $request)
    {
        $search = "%{$request->search}%";
        $drawings = App\Drawing::sortable()->where($request->column, 'like', $search)->get();
        return view('welcome', compact('drawings'));
    }

    public function imgPage($id){
        $drawing = App\Drawing::find($id);
        return view('draw.index', compact('drawing'));
    }
}
