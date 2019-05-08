@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Edit customer</h3>
    </div>
</div>

<div class="clearfix"></div>
{!! Form::open(['action' => ['CustomerController@update', $customer->id], 
'method' => 'patch', 
'class' => 'form-horizontal form-label-left', 
'id' => 'demo-form2']) !!}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <!-- Content-->
                <div class="x_title">
                    <h2>Customer details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p><small>* indicates required field</small></p>
                    <div class="form-group">
                        {!! Form::label('name', 'Company name *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('name', $customer->name, ['id'=>'name', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Address', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('address',  $customer->address, ['id'=>'address', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('city', 'City', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('city',  $customer->city, ['id'=>'city', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('cp', 'CP', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('cp',  $customer->cp, ['id'=>'cp', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            @error('cp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('country', 'Country', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('country',  $customer->country, ['id'=>'country', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            @error('country')
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
        {!! Form::submit('Update customer', ['class' => 'btn btn-success']) !!}
        <br /><br />  <br />           
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






    
