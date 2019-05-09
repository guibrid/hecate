@extends('layouts.auth')

@section('content')
<div>
  
        <div class="login_wrapper">
            <div class="animate form login_form">
            <section class="login_content">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h1>Register user</h1>
                        <!--<div class="form-group" id="roles">
                            <label for="role">{{ __('User role') }}</label><br />
                            @foreach ($roles as $key => $role)
                                {!!Form::checkbox('roles[]', $key, false, ['class'=>$role])!!} {{$role}}
                            @endforeach
                            @if ($errors->has('roles'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif

                        </div>-->
                        
                        <div class="form-group" id="customerField">
                            <label for="customer_id">{{ __('Customer') }}</label><br />
                            {!! Form::select('customer_id', $customers, null, ['id'=>'customer_id', 'class'=>'form-control ', 'placeholder'=>'Select customer...', 'require' =>'required']) !!}
                            @error('customer_id')
                                <div class="alert alert-danger">{{ $errors->first('customer_id') }}</div>
                            @enderror
 
                        </div>
                        
                        <div class="form-group">
                            <hr />
                            <label for="name">{{ __('User name') }}</label><br />
                            {!! Form::text('name', null, ['id'=>'name', 'class'=>'form-control ', 'placeholder'=>'Ex: John Doe...', 'require' =>'required']) !!}
                            @error('name')
                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            @enderror

                        </div>
                        
                        <div class="form-group">
                            <hr />
                            <label for="email">{{ __('E-mail address') }}</label><br />
                            {!! Form::text('email', null, ['id'=>'email', 'class'=>'form-control ', 'placeholder'=>'Ex: john.doe@hecate.com...', 'require' =>'required']) !!}
                            @error('email')
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <hr />
                            <label for="password">{{ __('Password') }}</label><br />
                                {!! Form::password('password', ['id'=>'password', 'class'=>'form-control ', 'placeholder'=>'8 caracters minimum...', 'require' =>'required']) !!}
                                @error('password')
                                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                @enderror
                        </div>
                        
                        <div class="form-group">
                            <hr />
                            <label for="password-confirm">{{ __('Confirm Password') }}</label> <br /> 
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="required" placeholder="Type your password again...">
                        </div>
                        
                        <div class="form-group">
                            <hr />
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </section>
            </div>
    
        </div>
    </div>
@endsection
<!-- CSS require for this view -->
@section('viewCSS')

@stop

<!-- Script require for this view -->
@section('viewScripts')


<script>
    $(document).ready(function() {

        //ROLES CHECKBOX BEHAVIOR
        $('input[name="roles[]"]').removeAttr('checked');
        $('input[name="roles[]"]').on("change",function(){
            
            $('div#roles input').attr('disabled', false);

            $('div#roles input:checked').each(function() {

                if( $(this).attr('class') == 'user') {
                    $('div#roles input').attr('disabled', 'disabled');
                    $(this).attr('disabled', false);
                } else {
                    $('div#roles input.user').attr('disabled', 'disabled');
                }

            });

        });

        
    });
</script>

@stop





    

