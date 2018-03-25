@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Auth::check())
        @if(Auth::user()->admin)
            <a class="nav-link btn btn-light mr-1" role="button" href="/createEvent">{{__('messages.add_event')}}</a>
        @endif
        @endif
        <div class="card-columns py-5 bg-light ml-4">
            @foreach($events as $event)
                @if(!$event->removed)
                <div class="card box-shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{$event->name}}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{__('messages.country')}}: {{$event->country}}</li>
                            <li class="list-group-item">{{__('messages.city')}}: {{$event->city}}</li>
                            <li class="list-group-item">{{__('messages.date')}}: {{$event->date}}</li>
                            <li class="list-group-item">{{__('messages.description')}}: {{$event->description}}</li>
                        </ul>
                    </div>
                    @if(Auth::check())
                        @if( Auth::user()->admin)
                            <a type="button" href="../../updateEvent/{{$event->id}}"class="btn btn-secondary">{{__('messages.edit')}}</a>
                            <a type="button" href="../../removeEvent/{{$event->id}}"class="btn btn-secondary">{{__('messages.delete')}}</a>
                        @endif
                    @endif
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection