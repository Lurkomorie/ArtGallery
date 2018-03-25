@extends('layouts.app')

@section('content')

    <div class="container">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <form class="form-inline pull-xs-right" action="{{route('find_artist')}}" method="post">
                        @csrf
                        <select id="column" name="column" class="form-group form-control mr-md-2">
                            <option value="name">{{ __('messages.name') }}</option>
                            <option value="city">{{ __('messages.city') }}</option>
                            <option value="country">{{ __('messages.country') }}</option>
                        </select>

                        <div class="form-group">
                            <input id="search" type="text" class="form-control{{ $errors->has('search') ? ' is-invalid' : '' }}" name="search" placeholder="{{__('messages.search')}}" required autofocus>

                            @if ($errors->has('search'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('search') }}</strong>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-outline-success ml-md-2">
                            {{ __('messages.search') }}
                        </button>
                    </form>
                </div>
            </nav>
        <div class="card-columns py-5 bg-light ml-4">

            @foreach($artists as $artist)
                @if(!$artist->deleted && $artist->activated)
                <a href="userPage/{{$artist->id}}" style="text-decoration: none; color: black;">
                    <div class="card box-shadow ">
                        <img class="img-fluid rounded float-right mb-md-3" src="../{{$artist->avatar}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$artist->name}}</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{__('messages.country')}}: {{$artist->country}}</li>
                                <li class="list-group-item">{{__('messages.city')}}: {{$artist->city}}</li>
                                <li class="list-group-item">BIO: {{$artist->bio}}</li>
                            </ul>
                        </div>
                        @if(Auth::check())
                            @if(Auth::user()->id==$artist->id || Auth::user()->admin)
                                <a type="button" href="../../updateUser/{{$artist->id}}"class="btn btn-secondary">{{__('messages.edit')}}</a>
                                <a type="button" href="../../removeUser/{{$artist->id}}"class="btn btn-secondary">{{__('messages.delete')}}</a>
                            @endif
                        @endif
                    </div>


                </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection