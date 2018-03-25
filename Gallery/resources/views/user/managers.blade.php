@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card-columns py-5 bg-light ml-4">
            @foreach($artists as $artist)
                @if(!$artist->deleted  && $artist->role!='artist')
                    <a href="userPage/{{$artist->id}}" style="text-decoration: none; color: black;">
                        <div class="card box-shadow ">
                            <img class="img-fluid rounded float-right mb-md-3" src="../{{$artist->avatar}}" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{$artist->name}}</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{__('messages.role')}}: {{$artist->role}}</li>
                                    <li class="list-group-item">{{__('messages.email')}}: {{$artist->email}}</li>
                                    <li class="list-group-item">{{__('messages.country')}}: {{$artist->country}}</li>
                                    <li class="list-group-item">{{__('messages.city')}}: {{$artist->city}}</li>
                                    <li class="list-group-item">BIO: {{$artist->bio}}</li>
                                </ul>
                            </div>
                        </div>


                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection