@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card-columns py-5 bg-light ml-4">
            <h1>Sorted content</h1>
            @foreach($drawings as $drawing)
                @if(!$drawing->removed)
                    <div class="card box-shadow">
                        <img class="card-img-top img-fluid" src="{{$drawing->picture}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$drawing->name}}</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Author: {{\App\User::find($drawing->artistId)->name}}</li>
                                <li class="list-group-item">Country: {{$drawing->country}}</li>
                                <li class="list-group-item">City: {{$drawing->city}}</li>
                                <li class="list-group-item">Genre: {{$drawing->genre}}</li>
                                <li class="list-group-item">Technology: {{$drawing->technology}}</li>
                                <li class="list-group-item">Size: {{$drawing->size}}</li>
                            </ul>
                            <div class="card-footer">
                                <h3 class="card-title">Price: {{$drawing->price}}€</h3>
                                <small class="text-muted">{{$drawing->date}}</small>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-secondary">View</button>
                                @if(Auth::check())
                                    @if(Auth::user()->id==$drawing->artistId|| Auth::user()->admin)
                                        <a type="button" href="../../updateDrawing/{{$drawing->id}}"class="btn btn-secondary">Edit</a>
                                        <a type="button" href="../../removeDrawing/{{$drawing->id}}"class="btn btn-secondary">Delete</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection