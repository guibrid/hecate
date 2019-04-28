@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Create new document</h3>
    </div>
</div>

<div class="clearfix"></div>

{!! Form::open(['action' => 'DocumentController@store', 
'method' => 'post',
'files' => true,
'class' => 'form-horizontal form-label-left']) !!}

{!! Form::text('name'); !!}{!! Form::file('document'); !!}

{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}  

{!! Form::close() !!}

@endsection

<!-- CSS require for this view -->
@section('viewCSS')

@endsection

<!-- Script require for this view -->
@section('viewScripts')

@endsection