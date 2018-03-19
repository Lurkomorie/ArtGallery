@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Auth::check())
        @if(Auth::user()->admin)
            <a class="nav-link btn btn-light mr-1" role="button" href="/createEvent">Add event</a>
        @endif
        @endif
        <div class="card-columns py-5 bg-light ml-4">
            @foreach($events as $event)
                @if(!$event->removed)
                <div class="card box-shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{$event->name}}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Country: {{$event->country}}</li>
                            <li class="list-group-item">City: {{$event->city}}</li>
                            <li class="list-group-item">Genre: {{$event->date}}</li>
                            <li class="list-group-item">Description: {{$event->description}}</li>
                        </ul>
                    </div>
                    @if(Auth::check())
                        @if( Auth::user()->admin)
                            <a type="button" href="../../updateEvent/{{$event->id}}"class="btn btn-secondary">Edit</a>
                            <a type="button" href="../../removeEvent/{{$event->id}}"class="btn btn-secondary">Delete</a>
                        @endif
                    @endif
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection