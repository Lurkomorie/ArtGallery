@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.set_role') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('set_role') }}" enctype="multipart/form-data">
                            @csrf
                            <input name="id" id="id" value="{{$artist->id}}" hidden>
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('messages.role') }}</label>
                                <div class="col-md-6">
                                    <input id="role" type="text" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="role" required>

                                    @if ($errors->has('role'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('messages.add') }}
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
