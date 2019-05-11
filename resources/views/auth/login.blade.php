@extends('layouts.auth')

@section('content')



<div>
  
    <div class="login_wrapper">
        <div class="animate form login_form">
        <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Login</h1>
            <div>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <p>
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
                </p>
            </div>
            <div>
                
                <button type="submit" class="btn btn-default submit">
                    {{ __('Login') }}
                </button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                    @if (Route::has('password.request'))
                    <!--<p class="change_link"> <a class="to_register" href="{{ route('password.request') }}">
                        {{ __('Lost your password?') }}
                    </a></p>-->
                @endif

                <div class="clearfix"></div>
                <br />

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
