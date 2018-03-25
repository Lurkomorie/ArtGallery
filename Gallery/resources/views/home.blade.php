@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.dashboard')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{__('messages.you_are_logged_in')}}!
                </div>
                <a href="/" type="button" class="btn btn-light btn-block">{{__('messages.home_page')}}</a>
            </div>
        </div>
    </div>
</div>
@endsection
