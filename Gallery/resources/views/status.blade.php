@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Status') }}</div>

                    <div class="card-body">
                            <div class="row">
                                <h2 class="col-md-6 mx-auto text-lg-center card-title">{{$message['text']}}</h2>
                            </div>

                                <h3 class="col-md-4 mx-auto text-lg-center card-title">Status: {{$message['status']}}</h3>

                            <div class="row">
                                <a href="/" class="col-md-4 mx-auto btn btn-dark">{{ __('Home Page') }}</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection