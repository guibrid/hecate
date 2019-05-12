@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Edit shipment</h3>
    </div>
</div>

<div class="clearfix"></div>

{!! Form::open(['action' => ['ShipmentController@update',  $shipment->id], 
'method' => 'patch', 
'class' => 'form-horizontal form-label-left', 
'id' => 'demo-form2']) !!}
{!! Form::hidden('transshipments') !!}
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Shipment details</h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p><small>* indicates required field</small></p>
                @if ($shipment->id)
                    {!! Form::hidden('id', $shipment->id, ['id'=>'shipment-id', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                @endif
                <div class="form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('title', $shipment->title, ['id'=>'title', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('number', 'Shipment number', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('number', $shipment->number, ['id'=>'number', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                        @error('number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('container_number', 'Container number', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('container_number', $shipment->container_number, ['id'=>'container_number', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                        @error('container_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('document_reception ', 'Document reception date', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='datetimepickerdocument_reception'>
                            {!! Form::text('document_reception', \Carbon\Carbon::parse($shipment->document_reception)->format('d/m/Y'), ['id'=>'document_reception', 'class'=>'form-control col-md-7 col-xs-12']) !!}
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
                            {!! Form::text('custom_control', \Carbon\Carbon::parse($shipment->custom_control)->format('d/m/Y'), ['id'=>'custom_control', 'class'=>'form-control col-md-7 col-xs-12']) !!}
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
                            {!! Form::text('cutoff', \Carbon\Carbon::parse($shipment->cutoff)->format('d/m/Y'), ['id'=>'cutoff', 'class'=>'form-control col-md-7 col-xs-12']) !!}
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
                        {!! Form::textarea('comment', $shipment->comment, ['class' => 'resizable_textarea form-control', 'rows' => 3, 'id' => 'comment']) !!}
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

        var transshipments = JSON.parse('{!! $transshipments !!}'); // Get the shipment transshipment saved

        $(document).ready(function() {

            if (transshipments.length == 0){
                $('#showTransshipments').append('<p>No transshipment registered.</p>');// Append le array des transshipment à la view
            } else {
                $("input[name='transshipments']").val(JSON.stringify(transshipments));
                showTransshipments(transshipments)
            }

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

            $("select#type").on("change", function(){ 
                $('#origin_place, #destination_place').empty()
                getPlacesList($(this).val()) 
            });


        });

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
                                 "comment-transshipment": $('#comment-transshipment').val(),
                                 "origin_place": $('#origin_place').val() ,
                                 "destination_place": $('#destination_place').val() ,
                                 "shipment_id": $('#shipment-id').val(),
                                })
            // Reset all the transshipment input in modal
            $('#type, #origin_place, #departure, #destination_place, #arrival, #vessel, #comment-transshipment').val('')
            //Reset Origin & destination to disable
            $('#origin_place, #destination_place').prop("disabled", true);
            // Ajouter à l'imput transshipment le array serialize de tous les transshipments
            $("input[name='transshipments']").val(JSON.stringify(transshipments));
            // Show transshipment table
            console.log(transshipments)
            showTransshipments(transshipments)
        }

        function showTransshipments(transshipmentsArray){
            $('#showTransshipments').empty(); // Reset la view des transshipments ajouté
            // Create table to dispay
            var transshipmentTable = '<table id="transshipments-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">';
            transshipmentTable += '<thead><tr><th>Type</th><th>Origin</th><th>Departure</th><th>Destination</th><th>Arrival</th><th>Vessel</th></tr></thead><tbody>';
            $.each(transshipmentsArray, function( index, transshipment ) {
                transshipmentTable += '<tr>'
                transshipmentTable += '<td>'+transshipment.type+'</td>'
                transshipmentTable += '<td>'+transshipment.origin.title+'</td>'
                transshipmentTable += '<td>'+transshipment.departure+'</td>'
                transshipmentTable += '<td>'+transshipment.destination.title+'</td>'
                transshipmentTable += '<td>'+transshipment.arrival+'</td>'
                transshipmentTable += '<td>'+transshipment.vessel+'</td>'
                transshipmentTable += '</tr>'
            });
            transshipmentTable += '</tbody></table>'
            $('#showTransshipments').append(transshipmentTable);// Append le table des transshipment à la view
        }

        function checkEmptyInputs(inputFields) {
            var empty = false;
            $(".alert").remove() // Reset all alert
            $.each(inputFields, function( index, input ) {
                if (input.value == ''){
                    $(this).closest('div.col-md-6').append('<div class="alert alert-danger">This field is required</div>')
                    empty = true; 
                }
            })
            return empty;
        }
        
    </script>



@stop