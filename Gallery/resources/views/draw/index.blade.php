@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
        <div class="card col-md-7">
        <img class="card-img-top img-fluid img-rounded" src="../{{$drawing->picture}}">
        </div>
        <div class="card col-md-4 ml-md-2">
            <h1 class="card-title text-lg-center mt-md-2">{{$drawing->title}}</h1>
                <ul class="list-group list-group-flush">
                    <a href="../userPage/{{$drawing->artistId}}"><li class="list-group-item">{{__('messages.author')}}: {{\App\User::find($drawing->artistId)->name}}</li></a>
                    <li class="list-group-item">{{__('messages.country')}}: {{$drawing->country}}</li>
                    <li class="list-group-item">{{__('messages.city')}}: {{$drawing->city}}</li>
                    <li class="list-group-item">{{__('messages.genre')}}: {{$drawing->genre}}</li>
                    <li class="list-group-item">{{__('messages.technology')}}: {{$drawing->technology}}</li>
                    <li class="list-group-item">{{__('messages.size')}}: {{$drawing->size}}</li>
                </ul>
            <div class="card-footer mt-md-5">
                <h3 class="card-title">{{__('messages.price')}}: {{$drawing->price}}€</h3>
                <small class="text-muted">{{$drawing->date}}</small>
            </div>
            <a class="btn btn-outline-success" href="../../email/{{$drawing->id}}">{{ __('messages.send_email_to_administrator') }}</a>
            @if(Auth::check())
                @if(Auth::user()->id==$drawing->artistId|| Auth::user()->admin)
                    <a type="button" href="../../updateDrawing/{{$drawing->id}}"class="btn btn-secondary">{{__('messages.edit')}}</a>
                    <a type="button" href="../../removeDrawing/{{$drawing->id}}"class="btn btn-secondary">{{__('messages.delete')}}</a>
                @endif
            @endif
        </div>
    </div>
    </div>

@endsection