@extends('layouts.auth')

@section('content')

<div>
  
    <div class="login_wrapper">

        <div class="animate form login_form">

            <section class="login_content">
                <form method="POST" action="{{ route('first.password') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input id="email" type="hidden" name="email" value="{{ $email }}" required >
                    <h1>{{ __('Set Password') }}</h1>
                    <p>Password must contain at least 8 caracters, one uppercase letter and one number</p>
                    <div>
                        {!! Form::password('password', ['id'=>'password', 'class'=>'form-control ', 'placeholder' => 'Type your password...']) !!}
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div>
                        {!! Form::password('password_confirmation', ['id'=>'password-confirm', 'class'=>'form-control ', 'placeholder' => 'Type your password...']) !!}
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">
                            {{ __('Save & login') }}
                        </button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <div>
                            <h1>
                                <img src="{{ Helpers::getAccountLogo() }}" width="180" />    
                            </h1>
                        </div>
                    </div>
                </form>
            </section>

        </div>

    </div>

</div>

@endsection

