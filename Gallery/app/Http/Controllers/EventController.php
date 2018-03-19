<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;

class EventController extends Controller
{
    public function index(){
        $events = App\Event::orderBy('date')->get();
        return view('events.index', compact('events'));
    }

    public function getCreateForm(){
        return view('events.create');
    }

    public function createNew(Request $request){


        $event = new App\Event();

        $event->name = $request->name;
        $event->city = $request->city;
        $event->country = $request->country;
        $event->date = $request->date;
        $event->description = $request->description;

        $event->save();
        $events = App\Event::orderBy('date')->get();
        return view('events.index', compact('events'));
    }

    public function getUpdateForm($id){
        $event = App\Event::find($id);
        return view('events.update', compact('event'));
    }

    public function update(Request $request){
        $event = App\Event::find($request->id);

        $event->name = $request->name;
        $event->city = $request->city;
        $event->country = $request->country;
        $event->date = $request->date;
        $event->description = $request->description;

        $event->save();
        $message = ['text' => 'Drawing creating', 'status' => 'DONE'];
        return view('status', compact('message'));
    }

    public function remove($id){
        $event = App\Event::find($id);
        $event -> removed = 1;
        $event -> save();
        $message = ['text' => 'Event removed', 'status' => 'DONE'];
        return view('status', compact('message'));
    }

}
