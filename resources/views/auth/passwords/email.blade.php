@extends('layouts.app_login_reset')

@section('content')
<main>
    <div class="content-wrap">
        <div class="login-form">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" id="form">
                <h3>{{ __(' Type Your Email, you will recieve a mail to reset your password') }}</h3>
                @csrf

                <div class="field-wrap">
                    <label for="email" >{{ __('E-mail Address') }} <span class="req">*</span></label>

                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="button">
                    {{ __('Send Password Reset Link') }}
                </button>
            </form>
        </div>
    </div>
</main>

@endsection
