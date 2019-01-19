@extends('layouts.app_login_reset')
@section('content')

<main>
    <div class="content-wrap">
        <div class="login-form">
            <form method="POST" action="{{ route('login') }}" id="form">
                <h3>Login to your Dashboard</h3>
                @csrf

                <div class="field-wrap">
                    <label for="email">{{ __('Email Address') }} <span class="req">*</span></label>

                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="field-wrap">
                    <label for="password">{{ __('Password') }} <span class="req">*</span></label>

                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="action">
                    
                    <label for="rememberMe" id="remember">
                        <input type="checkbox" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }} >
                        {{ __('Remember Me') }}
                    </label>
                    <p class="forgot">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </p>
                    
                </div>
                
                <button type="submit" class="button">
                    {{ __('Login') }}
                </button>

            </form>
        </div>
    </div>
</main>

@endsection
