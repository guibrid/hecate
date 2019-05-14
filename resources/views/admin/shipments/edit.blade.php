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
                    {!! Form::label('number', 'Consol number', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
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

        var transshipments = JSON.parse('{!! $transshipments !!}'); // Get the transshipment from Query

        $(document).ready(function() {
            // Convertir les dates au format dd/mm/YYYY
            $.each(transshipments, function( index, transshipment ) {
                transshipment.departure = convertDate(transshipment.departure);
                transshipment.arrival = convertDate(transshipment.arrival);
            });

            // Show saved transshipment on page load
            if (transshipments.length == 0){
                $('#showTransshipments').append('<p>No transshipment registered.</p>');// Append le array des transshipment à la view
            } else {
                $("input[name='transshipments']").val(JSON.stringify(transshipments));
                showTransshipments(transshipments)
            }

            // Rest the transshipment modal on Close
            $("#transshipmentModal").on("hidden.bs.modal", function () {
                $("#transshipmentModal :input").val('');
            });
            $("#transshipmentModal").on("shown.bs.modal", function(e){
                getPlacesList($("select#type").val()) 
            });

            // Save in JS Object the transshimpent
            $("#registerTransshipment").on("click", function(e){
                e.preventDefault()
                if( checkEmptyInputs($("#transshipmentModal :input[required]:visible")) == false)
                
                    registerTransshipment()
            });

            // Vider les liste au changement de type du transshipment
            $("select#type").on("change", function(){ 
                $('#origin_place, #destination_place').empty()
                getPlacesList($(this).val()) 
            });

            
            $('.date').datetimepicker({
                format: 'DD/MM/YYYY'
            });


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

        // Get the liste of places regarding the type selected
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

        // Insert/Update the transshipment in JS Object
        function registerTransshipment(){

            $('#transshipmentModal').modal('toggle'); // Close transshipment modal
            
            if($('#transshipmentModal #transshipment_index').val() != '') {   // Update if oject index exist

                var index = $('#transshipmentModal #transshipment_index').val();
                transshipments[index].type = $('#transshipmentModal #type').val();
                transshipments[index].origin.title = $("#transshipmentModal #origin_place option:selected").text();
                transshipments[index].departure = $('#transshipmentModal #departure').val();
                transshipments[index].destination.title = $("#transshipmentModal #destination_place option:selected").text();
                transshipments[index].arrival = $('#transshipmentModal #arrival').val();
                transshipments[index].vessel = $('#transshipmentModal #vessel').val();
                transshipments[index].comment = $('#transshipmentModal #comment_transshipment').val();
                transshipments[index].origin_place = $('#transshipmentModal #origin_place').val();
                transshipments[index].destination_place = $('#transshipmentModal #destination_place').val();
                transshipments[index].shipment_id = $('#transshipmentModal #shipment-id').val();

            } else {   // Insert the new transshipment if no existing index

                transshipments.push({
                    "type": $('#transshipmentModal #type').val() ,
                    "origin": {"title": $("#transshipmentModal #origin_place option:selected").text() },
                    "departure": $('#transshipmentModal #departure').val() ,
                    "destination": {"title":$("#transshipmentModal #destination_place option:selected").text()} ,
                    "arrival": $('#transshipmentModal #arrival').val() ,
                    "vessel": $('#transshipmentModal #vessel').val() ,
                    "comment": $('#transshipmentModal #comment_transshipment').val(),
                    "origin_place": $('#transshipmentModal #origin_place').val() ,
                    "destination_place": $('#transshipmentModal #destination_place').val() ,
                    "shipment_id": $('#transshipmentModal #shipment-id').val(),
                })
            }
            
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