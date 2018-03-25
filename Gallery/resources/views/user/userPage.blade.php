@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron jumbotron-fluid row">
            <div class="col-md-7">
                <h2 class="display-3">{{\App\User::find($artistId)->name}}</h2>
                <p class="lead">{{__('messages.city')}}: {{\App\User::find($artistId)->city}}</p>
                <p class="lead">{{__('messages.country')}}: {{\App\User::find($artistId)->country}}</p>
                <p class="lead">Bio: {{\App\User::find($artistId)->bio}}</p>
                @if(\App\User::find($artistId)->role!='artist')
                    <p class="lead">{{__('messages.role')}}: {{\App\User::find($artistId)->role}}</p>
                @endif
                @if(Auth::check())
                    @if(Auth::user()->id==\App\User::find($artistId)->id || Auth::user()->admin)
                        <div class="mt-md-5">
                            <a type="button" href="../../updateUser/{{\App\User::find($artistId)->id}}"class="btn btn-secondary">{{__('messages.edit')}}</a>
                            <a type="button" href="../../removeUser/{{\App\User::find($artistId)->id}}"class="btn btn-secondary">{{__('messages.delete')}}</a>
                            <a type="button" href="../../addAvatar/{{\App\User::find($artistId)->id}}"class="btn btn-secondary">{{__('messages.add_avatar')}}</a>
                            @if(Auth::user()->admin)
                                <a type="button" href="../../setRole/{{\App\User::find($artistId)->id}}"class="btn btn-secondary">{{__('messages.set_role')}}</a>
                            @endif
                        </div>
                    @endif
                @endif
            </div>
            <div class="col-md-4 float-right">
                <img class="img-fluid rounded float-right" src="../{{\App\User::find($artistId)->avatar}}" alt="">
            </div>
        </div>
        <div class="card-columns py-5 bg-light ml-4">
            @foreach(\App\Drawing::where('artistId', $artistId)->get() as $drawing)
                @if(!$drawing->removed)
                    <a href="../img/{{$drawing->id}}" style="text-decoration: none; color: black;">
                <div class="card box-shadow">
                    <img class="card-img-top img-fluid" src="..\{{$drawing->picture}}">
                    <div class="card-body">
                        <h5 class="card-title text-lg-center">{{$drawing->title}}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{__('messages.country')}}: {{$drawing->country}}</li>
                            <li class="list-group-item">{{__('messages.city')}}: {{$drawing->city}}</li>
                            <li class="list-group-item">{{__('messages.genre')}}: {{$drawing->genre}}</li>
                            <li class="list-group-item">{{__('messages.technology')}}: {{$drawing->technology}}</li>
                            <li class="list-group-item">{{__('messages.size')}}: {{$drawing->size}}</li>
                        </ul>
                        <div class="card-footer">
                            <h3 class="card-title">{{__('messages.price')}}: {{$drawing->price}}€</h3>
                            <small class="text-muted">{{$drawing->date}}</small>
                        </div>
                        <div class="btn-group" role="group">
                            @if(Auth::check())
                            @if(Auth::user()->id==$artistId || Auth::user()->admin)
                            <a type="button" href="../../updateUser/{{$drawing->id}}"class="btn btn-secondary">{{__('messages.edit')}}</a>
                            <a type="button" href="../../removeUser/{{$drawing->id}}"class="btn btn-secondary">{{__('messages.delete')}}</a>

                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection