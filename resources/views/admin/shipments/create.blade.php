@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Create new shipment</h3>
    </div>
</div>

<div class="clearfix"></div>

{!! Form::open(['action' => 'ShipmentController@store', 
'method' => 'post', 
'class' => 'form-horizontal form-label-left', 
'id' => 'demo-form2']) !!}
{!! Form::hidden('transshipments') !!}
{!! Form::hidden('shipment-id',null, ['id'=>'shipment-id']) !!}
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Shipment details</h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    <p><small>* indicates required field</small></p>
                <div class="form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('title', null, ['id'=>'title', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('number', 'Consol number', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('number', null, ['id'=>'number', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                        @error('number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('container_number', 'Container number', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('container_number', null, ['id'=>'container_number', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                        @error('container_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('document_reception ', 'Document reception date', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='datetimepickerdocument_reception'>
                            {!! Form::text('document_reception', null, ['id'=>'document_reception', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        @error('document_reception ')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('custom_control', 'Custom control date', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='datetimepickercustom_control'>
                            {!! Form::text('custom_control', null, ['id'=>'custom_control', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        @error('custom_control')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('cutoff', 'Cutoff date', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='datetimepickercutoff'>
                            {!! Form::text('cutoff', null, ['id'=>'cutoff', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        @error('cutoff')
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
            </div>
        </div>
    </div>
</div>


<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Transshipments</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                        <div id="showTransshipments"></div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transshipmentModal"><i class="fa fa-cubes"></i> Add transshipment</button>
                </div>
            </div>
        </div>
    </div>


<!-- <div class="ln_solid"></div> -->
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        {!! Form::submit('Save your shipment', ['class' => 'btn btn-success']) !!}             
    </div>
</div>

{!! Form::close() !!}

@include('admin.shipments.modal.transshipment')

@endsection

<!-- CSS require for this view -->
@section('viewCSS')
    <!-- Switchery -->
    <link href="{{ asset('bower_components/gentelella/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="{{ asset('bower_components/gentelella/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
@stop

<!-- Script require for this view -->
@section('viewScripts')
    <!-- Switchery -->
    <script src="{{ asset('bower_components/gentelella/vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- bootstrap-datetimepicker --> 
    <script src="{{ asset('bower_components/gentelella/vendors/moment/min/moment.min.js')}}"></script>   
    <script src="{{ asset('bower_components/gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script>
        $(document).ready(function() {

            $('.date').datetimepicker({
                format: 'DD/MM/YYYY'
            });

            $("#transshipmentModal").on("shown.bs.modal", function(e){
                getPlacesList($("select#type").val()) 
            });

            $("#registerTransshipment").on("click", function(e){
                e.preventDefault()
                if( checkEmptyInputs($("#transshipmentModal :input[required]:visible")) == false)
                    registerTransshipment()
            });

            // Reset the transshipment modal on Close
            $("#transshipmentModal").on("hidden.bs.modal", function () {
                $("#transshipmentModal :input").val('');
            });

            $("select#type").on("change", function(){ 
                $('#origin_place, #destination_place').empty()
                getPlacesList($(this).val()) 
            });

            $('#showTransshipments').append('<p>No transshipment registered.</p>');// Append le array des transshipment à la view

        });

        // Fill the transshipment modal form with the data for update
        function getTransshipment(index){
            $('#transshipmentModal').modal('show');
            $('#transshipmentModal #transshipment_index').val(index)
            $('#transshipmentModal select#type').val(transshipments[index].type);
            $('#transshipmentModal select#origin_place').empty().val(transshipments[index].origin.title);
            $('#transshipmentModal input#departure').val(transshipments[index].departure);
            $('#transshipmentModal select#destination_place').empty().val(transshipments[index].destination.title);
            $('#transshipmentModal input#arrival').val(transshipments[index].arrival);
            $('#transshipmentModal input#vessel').val(transshipments[index].vessel);
            $('#transshipmentModal #comment_transshipment').val(transshipments[index].comment);
        }

        function getPlacesList(type){

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            var url = "{{ url ('/getPlacesList') }}/" +type;

            $.ajax({
                type: 'get',
                url: url,
                success:function(response){
                    
                    if (response.length == 0){
                        $('#origin_place, #destination_place').prop("disabled", true);
                    } else {
                        $('#origin_place, #destination_place').prop("disabled", false);
                    }

                    var listitems = '';
                    $.each(response, function(key,value){
                        listitems += '<option value=' + value.id + '>' + value.title + '</option>';
                    });
                    
                    $('#origin_place, #destination_place').append(listitems);

                }
            });
        }

        var transshipments = new Array()

        function registerTransshipment(){
            $('#transshipmentModal').modal('toggle'); // Close transshipment modal
            // Add transshipment details to array
            transshipments.push({
                                 "type": $('#type').val() ,
                                 "origin": {"title": $("#origin_place option:selected").text() },
                                 "departure": $('#departure').val() ,
                                 "destination": {"title":$("#destination_place option:selected").text()} ,
                                 "arrival": $('#arrival').val() ,
                                 "vessel": $('#vessel').val() ,
                                 "comment": $('#comment_transshipment').val(),
                                 "origin_place": $('#origin_place').val() ,
                                 "destination_place": $('#destination_place').val() ,
                                 "shipment_id": $('#shipment-id').val(),
                                })
            
            // Reset all the transshipment input in modal
            $('#type, #origin_place, #departure, #destination_place, #arrival, #vessel, #comment_transshipment').val('')
            //Reset Origin & destination to disable
            $('#origin_place, #destination_place').prop("disabled", true);
            // Ajouter à l'imput transshipment le array serialize de tous les transshipments
            $("input[name='transshipments']").val(JSON.stringify(transshipments));
            // Show transshipment table
            showTransshipments(transshipments)
        }

    </script>



@stop