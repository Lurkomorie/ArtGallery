@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.create') }}</div>

                    <div class="card-body">
                        <form action="{{route('create_drawing')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('messages.title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('messages.city') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('messages.country') }}</label>

                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required>

                                    @if ($errors->has('country'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('messages.date') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required>

                                    @if ($errors->has('date'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('messages.genre') }}</label>

                                <div class="col-md-6">
                                    <input id="genre" type="text" class="form-control{{ $errors->has('genre') ? ' is-invalid' : '' }}" name="genre" value="{{ old('genre') }}" required>

                                    @if ($errors->has('genre'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('genre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="technology" class="col-md-4 col-form-label text-md-right">{{ __('messages.technology') }}</label>

                                <div class="col-md-6">
                                    <input id="technology" type="text" class="form-control{{ $errors->has('technology') ? ' is-invalid' : '' }}" name="technology" required>

                                    @if ($errors->has('technology'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('technology') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('messages.size') }}</label>

                                <div class="row ml-3">
                                    <input id="sizeOne" type="number" class="form-control col-md-2 mr-1{{ $errors->has('sizeOne') ? ' is-invalid' : '' }}" name="sizeOne" required>
                                    x
                                    <input id="sizeTwo" type="number" class="form-control col-md-2 ml-1{{ $errors->has('sizeTwo') ? ' is-invalid' : '' }}" name="sizeTwo" required>
                                    <select class="ml-1" name="unit" required>
                                        <option value="Cm">Cm</option>
                                        <option value="Dm">Dm</option>
                                    </select>
                                    @if ($errors->has('size'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('messages.status') }}</label>

                                <div class="col-md-6">
                                    <select name="status" class="form-control">
                                        <option value="For Sale">{{__('messages.for_sale')}}</option>
                                        <option value="Sold">{{__('messages.sold')}}</option>
                                        <option value="Not for Sale">{{__('messages.not_for_sale')}}</option>
                                        <option value="Private Collection">{{__('messages.private_collection')}}</option>
                                        <option value="Donated">{{__('messages.donated')}}</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('messages.price') }}</label>

                                <div class="col-md-3">
                                    <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" required>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col" style="position: relative;">€</div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('messages.image') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" required>

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('messages.submit') }}
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection