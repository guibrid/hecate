@extends('layouts.auth')

@section('content')

<div>
  
    <div class="login_wrapper">

        <div class="animate form login_form">

            <section class="login_content">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <h1>{{ __('Reset Password') }}</h1>
                    <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Your email address..." required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div>
                            <p>Password must contain at least 8 caracters, one uppercase letter and one number</p>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Type your password..." required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Type your again..." required autocomplete="new-password">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-default submit">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <div>
                            <h1><img src="{{ asset('img/hecate_tracking_icon.png')}}" width="60" /> {{ config('app.name') }}</h1>
                        </div>
                    </div>
                </form>
            </section>

        </div>

    </div>

</div>

@endsection
