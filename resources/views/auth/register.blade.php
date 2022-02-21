@extends('layouts.auth')

@section('auth')
<div class="auth-form" dir="ltr">
    <h4 class="text-center mb-4">Sign up your account</h4>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name"><strong>{{ __('Name') }}</strong></label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="form-group">
            <label for="email"><strong>{{ __('E-Mail Address') }}</strong></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="form-group">
            <label for="password"><strong>{{ __('Password') }}</strong></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm"><strong>{{ __('Confirm Password') }}</strong></label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
    </div>
</div>
@endsection
