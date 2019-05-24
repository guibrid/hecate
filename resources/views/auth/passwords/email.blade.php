@extends('layouts.auth')

@section('content')

<div>
  
    <div class="login_wrapper">

        <div class="animate form login_form">

            <section class="login_content">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <h1>{{ __('Reset Password') }}</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your email address..." required autocomplete="email" autofocus>

                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

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

