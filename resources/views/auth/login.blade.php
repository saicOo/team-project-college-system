@extends('layouts.auth')

@section('auth')
<div class="auth-form" dir="ltr">
    <h4 class="text-center mb-4">Sign in your account</h4>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email"><strong>{{ __('E-Mail Address') }}</strong></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="form-group">
            <label for="password"><strong>{{ __('Password') }}</strong></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="form-row d-flex justify-content-between mt-4 mb-2">
            <div class="form-group">
                <div class="form-check ml-2">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="basic_checkbox_1">{{ __('Remember Me') }}</label>
                </div>
            </div>
            <div class="form-group">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
        </div>
    </form>
    @if (Route::has('register'))
    <div class="new-account mt-3">
        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
    </div>
    @endif
</div>
@endsection
