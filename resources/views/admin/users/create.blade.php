@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Create new user</h3>
    </div>
</div>

<div class="clearfix"></div>
{!! Form::open(['action' => ['UserController@store'], 
'method' => 'post', 
'class' => 'form-horizontal form-label-left']) !!}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <!-- Content-->
                <div class="x_title">
                    <h2>Place details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p><small>* indicates required field</small></p>
                    <div class="form-group">
                        User {!! Form::radio('role', 'User', true) !!}
                        Editor {!! Form::radio('role', 'Editor') !!}
                        Manager {!! Form::radio('role', 'Manager') !!}
                        Director {!! Form::radio('role', 'director') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('customer', 'Customer *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('customer', ['L' => 'Large', 'S' => 'Small'], 'S', ['id'=>'customer', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            @error('customer')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Name *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('name', null, ['id'=>'name', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex: John Doe...']) !!}
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('email', null, ['id'=>'email', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex: johndoe@hecate.com']) !!}
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- End content-->
            </div>
        </div>
    </div>
</div>

<!-- End section -->

<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        {!! Form::submit('Create place', ['class' => 'btn btn-success triggerOverlay']) !!}
        <br /><br /><br />           
    </div>
</div>

{!! Form::close() !!}

@endsection

<!-- CSS require for this view -->
@section('viewCSS')

@stop

<!-- Script require for this view -->
@section('viewScripts')


@stop






    
