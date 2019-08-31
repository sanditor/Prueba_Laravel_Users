@extends('layouts.general')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="form-box animated fadeInUp">>
            @csrf
            <h1 class="form-title">SignIn</h1>

            <input id="email" type="email" placeholder="E-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus />
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif

            <input id="password" type="password" placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                        <label class="form-check-label" style="color:#fff" for="remember">
                            {{ __('Remember Me') }}
                        </label>

                    </div>
                </div>
            </div>
            <button type="submit">
                {{ __('Login') }}
            </button>

            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>


        </form>



    </div>
</div>
@endsection
