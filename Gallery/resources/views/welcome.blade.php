@extends('layouts.app')

@section('content')

    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
            <ul class="nav navbar-nav row">
                <li class="nav-item">
                    <button class="btn btn-link nav-link ml-md-3">@sortablelink('title',__('messages.sortbytitle'))</button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-link nav-link ml-md-3">@sortablelink('price',__('messages.sortbyprice'))</button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-link nav-link ml-md-3">@sortablelink('created_at',__('messages.sortbynewness'))</button>
                </li>
            </ul>
            <form class="form-inline pull-xs-right" action="{{route('find_drawing')}}" method="post">
                @csrf
                <select id="column" name="column" class="form-group form-control mr-md-2">
                    <option value="title">{{ __('messages.title') }}</option>
                    <option value="city">{{ __('messages.city') }}</option>
                    <option value="country">{{ __('messages.country') }}</option>
                    <option value="genre">{{ __('messages.genre') }}</option>
                    <option value="technology">{{ __('messages.technology') }}</option>
                    <option value="status">{{ __('messages.status') }}</option>
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
            <div class=" bg-light row">
            @foreach($drawings as $drawing)
                    @if(!$drawing->removed)
                <div class="mt-md-2 mb-md-2 col-md-4 hovereffect">
                    <img class="card-img-top img-fluid" src="{{$drawing->picture}}">
                    <div class="overlay">
                        <h1><a class="col-md-4" href="img/{{$drawing->id}}">{{$drawing->title}}</a></h1>
                        <p><a href="../userPage/{{$drawing->artistId}}}">{{__('messages.author')}}: {{\App\User::find($drawing->artistId)->name}}</a></p>
                        <p>{{__('messages.size')}}: {{$drawing->size}}</p>
                        <h1 class="mt-md-5">{{__('messages.price')}}: {{$drawing->price}}€</h1>
                    </div>
                </div>
                    @endif
            @endforeach
            </div>
        {!! $drawings->appends(\Request::except('page'))->render() !!}
    </div>
    </div>
@endsection