@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Create new port/airport</h3>
    </div>
</div>

<div class="clearfix"></div>
{!! Form::open(['action' => ['PlaceController@store'], 
'method' => 'post', 
'class' => 'form-horizontal form-label-left', 
'id' => 'demo-form2']) !!}

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
                        {!! Form::label('title', 'Title *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('title', null, ['id'=>'title', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex: Auckland harbour...']) !!}
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('abbreviation', 'Code', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('abbreviation', null, ['id'=>'abbreviation', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex: AKL']) !!}
                            @error('abbreviation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('type', 'Type *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('type', ['sea'=> 'Sea','air'=>'Air'], null, ['id'=>'type', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex: Sea or Air...']) !!}
                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('country', 'Country *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('country', null, ['id'=>'country', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex: New Zeland...']) !!}
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






    
