@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prezime" class="col-md-4 col-form-label text-md-right">{{ __('prezime') }}</label>

                            <div class="col-md-6">
                                <input id="prezime" type="text" class="form-control{{ $errors->has('prezime') ? ' is-invalid' : '' }}" name="prezime" value="{{ old('prezime') }}" required autofocus>

                                @if ($errors->has('prezime'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prezime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="broj_telefona" class="col-md-4 col-form-label text-md-right">{{ __('broj_telefona') }}</label>

                            <div class="col-md-6">
                                <input id="broj_telefona" type="text" class="form-control{{ $errors->has('broj_telefona') ? ' is-invalid' : '' }}" name="broj_telefona" value="{{ old('broj_telefona') }}" required autofocus>

                                @if ($errors->has('broj_telefona'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('broj_telefona') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adresa" class="col-md-4 col-form-label text-md-right">{{ __('adresa') }}</label>

                            <div class="col-md-6">
                                <input id="adresa" type="text" class="form-control{{ $errors->has('adresa') ? ' is-invalid' : '' }}" name="adresa" value="{{ old('adresa') }}" required autofocus>

                                @if ($errors->has('adresa'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('adresa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
