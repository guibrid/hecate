@extends('layouts.auth')

@section('content')
<div>
  
        <div class="login_wrapper">
            <div class="animate form login_form">
            <section class="login_content">
                    


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <h1>{{ __('Reset Password') }}</h1>
                        <div>
                                <input id="email" type="email" placeholder="Email address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div>
                            <button type="submit" class="btn btn-default submit">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                        <br />
                        <div class="separator">
                
                                <h1><img src="{{ asset('img/hecate_tracking_icon.png')}}" width="60" /> {{ config('app.name') }}</h1>
                                </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

@endsection
