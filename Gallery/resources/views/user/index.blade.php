@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card-columns py-5 bg-light ml-4">

            @foreach($artists as $artist)
                @if(!$artist->deleted)
                <a href="userPage/{{$artist->id}}" style="text-decoration: none; color: black;">
                <div class="card box-shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{$artist->name}}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Country: {{$artist->country}}</li>
                            <li class="list-group-item">City: {{$artist->city}}</li>
                            <li class="list-group-item">BIO: {{$artist->bio}}</li>
                        </ul>
                    </div>
                    @if(Auth::check())
                        @if(Auth::user()->id==$artist->id || Auth::user()->admin)
                            <a type="button" href="../../updateUser/{{$artist->id}}"class="btn btn-secondary">Edit</a>
                            <a type="button" href="../../removeUser/{{$artist->id}}"class="btn btn-secondary">Delete</a>
                        @endif
                    @endif
                </div>
                </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection