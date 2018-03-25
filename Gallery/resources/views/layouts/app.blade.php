<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ArtGallery') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hover.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
            <div class="container">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="/info"><img class="navbar-brand" src="../storage/images/logo.jpg"></a>
                    </li>
                </ul>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{__('messages.art_gallery') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link btn btn-light mr-1" role="button" href="/artists">{{ __('messages.artists') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-light mr-1" role="button" href="/events">{{__('messages.events')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-light mr-1" role="button" href="../management">{{__('messages.management')}}</a>
                        </li>

                        @if(Auth::check())
                        @if(Auth::user()->admin)
                            <li class="nav-item">
                                <a class="nav-link btn btn-light mr-1" role="button" href="/activate">{{__('messages.activate')}}</a>
                            </li>
                        @endif
                            @endif
                        <li class="nav-item">
                            <a class="nav-link btn btn-light mr-1" role="button" href="../email">{{__('messages.e-mail')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-light mr-1" role="button" href="../map">{{__('messages.be_our_guest')}}</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item ">
                            <a type="button" role="button" class="nav-link btn btn-light btn-sm " href="/en">En</a>
                        </li>
                        <li class="nav-item ">
                            <a type="button" role="button" class="nav-link btn btn-light btn-sm " href="/ru">Ru</a>
                        </li>
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('messages.register') }}</a></li>
                        @else
                            @if(Auth::user()->activated)
                            <li class="nav-item">
                                <a class="nav-link btn btn-light mr-1" role="button" href="../createDrawing">{{__('messages.upload drawing')}}</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.logout') }}
                                    </a>
                                    <a class="dropdown-item" href="/userPage/{{Auth::user()->id}}">
                                        {{ __('messages.myprofile') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4 mt-md-5">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/myjs.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEp6PZ-wytWuFa9uPVqXgdzmQVCBHku34&callback=initMap"
            async defer>
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
