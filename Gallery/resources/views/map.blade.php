@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="jumbotron row">
        <div class="col-md-6">
            <p class="lead">{{__('messages.come_to_visit')}}:</p>
            <p class="lead">Miho Gallery</p>
            <p class="lead">Chrysanthou Mylona 5, P. Lordos Bld., Block B</p>
            <p class="lead">Limassol, Cyprus 3030</p>
            <p class="mt-md-5 lead">{{__('messages.call_us')}}: +357 25 341463</p>
        </div>
        <div id='map' class="card col-md-5 float-right">
        </div>
    </div>
    </div>
@endsection
