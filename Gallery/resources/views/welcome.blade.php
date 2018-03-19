@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <h4 class=" text-lg-center">{{ __('Search for drawing') }}</h4>
            <form action="{{route('find_drawing')}}" method="post" >
                @csrf
                <div class="form-group row">
                    <select id="column" name="column" class="col-md-4">
                        <option value="title">{{ __('Title') }}</option>
                        <option value="city">{{ __('City') }}</option>
                        <option value="country">{{ __('Country') }}</option>
                        <option value="genre">{{ __('Genre') }}</option>
                        <option value="technology">{{ __('Technology') }}</option>
                        <option value="status">{{ __('Status') }}</option>
                    </select>
                    <div class="col-md">
                        <input id="search" type="text" class="form-control{{ $errors->has('search') ? ' is-invalid' : '' }}" name="search" required autofocus>

                        @if ($errors->has('search'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="form-group row">
                    <label for="sort" class="col col-form-label text-md-right">{{ __('Sort by') }}</label>
                    <select id="order" name="order" class="col text-lg-center mr-lg-3">
                        <option value="newness">{{ __('By newness') }}</option>
                        <option value="lth">{{ __('By price: low to high') }}</option>
                        <option value="htl">{{ __('By price: high to low') }}</option>
                    </select>
                </div>
                <div class="col-md">
                    <button type="submit" class="btn btn-primary col-4">
                        {{ __('Search') }}
                    </button>
                </div>
            </form>
        </div>

            <div class="card-columns py-5 bg-light ml-4">
                @if(isset($request))
                    <h5 class="row">Displayed drawings with {{$request->column}} "{{$request->search}}"</h5>
                @endif
            @foreach($drawings as $drawing)
                    @if(!$drawing->removed)
                <div class="card box-shadow">

                    <img class="card-img-top img-fluid" src="{{$drawing->picture}}">
                    <div class="card-body">
                        <h3 class="card-title text-lg-center">{{$drawing->title}}</h3>
                        <div >
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
                </div>
                    @endif
            @endforeach
        </div>
    </div>
@endsection