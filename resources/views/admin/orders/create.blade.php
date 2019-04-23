@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
            <h2>Create new order</h2>
            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />

            {!! Form::open(['action' => 'OrderController@store', 
                            'method' => 'post', 
                            'class' => 'form-horizontal form-label-left', 
                            'id' => 'demo-form2']) !!}

            <div class="form-group">
                {!! Form::label('customer-autocomplete', 'Customer *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!} 
               
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('customer', null, ['id'=>'customer-autocomplete', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('customer')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {!! Form::hidden('customer_id', null, ['id'=>'customer_id']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('recipient', 'Recipient *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('recipient', null, ['id'=>'recipient', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('recipient')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('supplier', 'Supplier *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('supplier', null, ['id'=>'supplier', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('supplier')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('number', 'Order number', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('number', null, ['id'=>'number', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('title', 'Title', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('title', null, ['id'=>'title', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('batch', 'Batch N°', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('batch', null, ['id'=>'batch', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('batch')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('load', 'Loading', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::select('load', ['lcl' => 'LCL', 'fcl' => 'FCL'], null, ['placeholder' => 'Select loading','id' => 'load', 'class' => 'form-control']) !!}
                    @error('load')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('package', 'Package number', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('package_number', null, ['id'=>'package', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('package_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('weight', 'Weight', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('weight', null, ['id'=>'weight', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('weight')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('volume', 'Volume', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('volume', null, ['id'=>'volume', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('volume')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('status_id', 'Status', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::select('status_id', $statuses, null, ['id' => 'status_id', 'class' => 'form-control']) !!}
                    @error('status_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('comment', 'Comment', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::textarea('comment', null, ['class' => 'resizable_textarea form-control', 'rows' => 3, 'id' => 'comment']) !!}
                    @error('comment')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    {!! Form::submit('Save you order', ['class' => 'btn btn-success']) !!}              
                </div>
            </div>

            {!! Form::close() !!}
        </div>
        </div>
    </div>
</div>


@endsection

<!-- CSS require for this view -->
@section('viewCSS')
      <!-- iCheck -->
      <link href="{{ asset('bower_components/gentelella/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
      <!-- bootstrap-wysiwyg -->
      <link href="{{ asset('bower_components/gentelella/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
      <!-- Select2 -->
      <link href="{{ asset('bower_components/gentelella/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
      <!-- Switchery -->
      <link href="{{ asset('bower_components/gentelella/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
      <!-- starrr -->
      <link href="{{ asset('bower_components/gentelella/vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
      <!-- bootstrap-daterangepicker -->
      <link href="{{ asset('bower_components/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@stop

<!-- Script require for this view -->
@section('viewScripts')
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('bower_components/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('bower_components/gentelella/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- bootstrap-daterangepicker
    <script src="{{ asset('bower_components/gentelella/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script> -->
    <!-- bootstrap-wysiwyg
    <script src="{{ asset('bower_components/gentelella/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/google-code-prettify/src/prettify.js')}}"></script> -->
    <!-- jQuery Tags Input
    <script src="{{ asset('bower_components/gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script> -->
    <!-- Switchery
    <script src="{{ asset('bower_components/gentelella/vendors/switchery/dist/switchery.min.js')}}"></script> -->
    <!-- Select2 
    <script src="{{ asset('bower_components/gentelella/vendors/select2/dist/js/select2.full.min.js')}}"></script>-->
    <!-- Autosize 
    <script src="{{ asset('bower_components/gentelella/vendors/autosize/dist/autosize.min.js')}}"></script>-->
    <!-- jQuery autocomplete -->
    <script src="{{ asset('bower_components/gentelella/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
    <!-- starrr 
    <script src="{{ asset('bower_components/gentelella/vendors/starrr/dist/starrr.js')}}"></script>-->

    <script>
        $(document).ready(function() {

            var customers = @php echo $customers; @endphp;
            var customersArray = $.map(customers, function(value, key) {
                return {
                value: value['name'],
                data: value['id']
                };
            });

            $('#customer-autocomplete').autocomplete({
                lookup: customersArray,
                onSelect: function (suggestion) {
                    $('#customer_id').val(suggestion.data);
                    $('#recipient').val(suggestion.value);
                }
            });

 
        });
    </script>

@stop

