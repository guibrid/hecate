@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Create new order</h3>
    </div>
</div>

<div class="clearfix"></div>

{!! Form::open(['action' => 'OrderController@store', 
'method' => 'post', 
'class' => 'form-horizontal form-label-left', 
'id' => 'demo-form2',
'files' => true]) !!}

{!! Form::hidden('packs') !!}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
            <h2>Order details</h2>
            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p><small>* indicates required field</small></p>
            <div class="form-group">
                {!! Form::label('customer-autocomplete', 'Customer *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!} 
               
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('customer', null, ['id'=>'customer-autocomplete', 'class'=>'form-control col-md-7 col-xs-12','placeholder' => 'Type customer name...']) !!}
                    @error('customer')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {!! Form::hidden('customer_id', null, ['id'=>'customer_id']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('recipient', 'Consignee *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('recipient', null, ['id'=>'recipient', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('recipient')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('supplier', 'Shipper/Supplier *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('supplier', null, ['id'=>'supplier', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex: Supplier 1, Supplier 2,...']) !!}
                    @error('supplier')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                    {!! Form::label('number', 'Booking n° *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('number', null, ['id'=>'number', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                        @error('number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <div class="form-group">
                {!! Form::label('order_number ', 'Order number', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('order_number', null, ['id'=>'order_number', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('order_number')
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
                {!! Form::label('bl_number', 'B/L & HAWB n°', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('bl_number', null, ['id'=>'bl_number', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('bl_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('batch', 'Batch n°', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('batch', null, ['id'=>'batch', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                    @error('batch')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('load', 'Shipment Mode', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::select('load', config('variables.form.shipmentModes'), null, ['placeholder' => 'Select shipment mode...','id' => 'load', 'class' => 'form-control']) !!}
                    @error('load')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>     
            <div class="form-group">
                {!! Form::label('value', 'Value', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('value', null, ['id'=>'value', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex: 10564.76']) !!}
                    @error('value')
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
        </div>
        </div>
    </div>
</div>
<!-- End Document section -->


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
            <h2>Pack details</h2>
            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('admin.orders.inc.packsTable')
            <div id="showPacks"></div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#packModal"><i class="fa fa-cubes"></i> Add pack</button>
        </div>
        </div>
    </div>
</div>



<!-- <div class="ln_solid"></div> -->
<div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
            <p>
                {!! Form::checkbox('notification', true, true, ['class' => 'js-switch']) !!} 
                Send notification to customer   
            </p>
        </div>
    </div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        {!! Form::submit('Save your order', ['class' => 'btn btn-success triggerOverlay']) !!}             
    </div>
</div>

{!! Form::close() !!}

@include('admin.orders.modal.pack')

@endsection

<!-- CSS require for this view -->
@section('viewCSS')
    <!-- Switchery -->
    <link href="{{ asset('bower_components/gentelella/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
@stop

<!-- Script require for this view -->
@section('viewScripts')
    <!-- Switchery -->
    <script src="{{ asset('bower_components/gentelella/vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{ asset('bower_components/gentelella/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>

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

            $( "form" ).submit(function( event ) {

                $('#customer-autocomplete + div.alert').remove();

                var customer_name = $('#customer-autocomplete').val();
                var customer_id = $('#customer_id').val();
                var find = 0;

                customersArray.forEach(function(element) {
                    if (element.value == customer_name && element.data == customer_id){
                        find = 1;
                    }
                });

                if (find == 1) {
                    return;  
                }

                $(document).scrollTop( $("#customer-autocomplete").offset().top );
                $( "#overlay" ).hide();
                $( "#customer-autocomplete" ).after( '<div class="alert alert-danger">This customer doesn\'t exist</div>' );
                $( "#customer-autocomplete, #customer_id, #recipient" ).val('');
                
                event.preventDefault();
            });

            $('#packsTable-responsive').DataTable( {
                paging: false,
                searching: false,
                ordering:  false,
                info:false
            });

            //Gestion des Packs
            var packs = new Array();
            $("input[name='packs']").val();

            function savePack(){
                // Add pack details to array
                packs.push({
                    "type": $('#type').val(),
                    "number": $('#packNumber').val(),
                    "inner_packs": $('#inner_packs').val(),
                    "length": $('#length').val().replace(",", "."),
                    "width": $('#width').val().replace(",", "."),
                    "height": $('#height').val().replace(",", "."),
                    "weight": $('#weight').val().replace(",", "."),
                    "volume": $('#volume').val().replace(",", "."),
                    "description": $('#description').val(),
                });
                // Set packs fields with new data
                $("input[name='packs']").val(JSON.stringify(packs));
            }

            function displayPack(){

                var newPack = packs[packs.length - 1] // Get the last element of Packs array
                var newPackKey = packs.length - 1
                $('#packsTable-responsive tbody').append('<tr id="pack_'+newPackKey+'"><td>'+ newPack.number+'</td><td>'+newPack.type+'</td><td>'+newPack.inner_packs+'</td><td>'+newPack.description+'</td><td>'+newPack.weight+'</td><td>'+ newPack.volume+'</td><td>'+newPack.length+'</td><td>'+newPack.width+'</td><td>'+newPack.height+'</td></tr>');
            
            }
            
            // validationPacksFields
            function isInt(value){
                return !isNaN(value) && 
                        parseInt(Number(value)) == value && 
                        !isNaN(parseInt(value, 10));
            }

            function isFloat(val) {
                var floatRegex = /^-?\d+(?:[.,]\d*?)?$/;
                if (!floatRegex.test(val))
                    return false;

                val = parseFloat(val);
                if (isNaN(val))
                    return false;
                return true;
            }

            $("#registerPack").on("click", function(e){
                e.preventDefault();

                let intVal = [$('#packNumber').val(), $('#inner_packs').val()]
                let doubleVal = [$('#length').val(), $('#width').val(),$('#height').val(),$('#weight').val(),$('#volume').val()]
                let validator = true;
                let unvalidValue = new Array();

                intVal.forEach(Val => {
                    if(!isInt(Val) && !!Val) { 
                        validator = false;
                        unvalidValue.push('  ['+Val+']  ');
                    }
                });

                doubleVal.forEach(Val => {
                    if(!isFloat(Val) && !!Val) { 
                        validator = false;
                        unvalidValue.push('  ['+Val+']  ');
                    }
                });

                if(validator){

                    $('#packsTable-responsive tr.odd').remove(); // Remove no item in the table
                    $('#packModal').modal('toggle'); // Close Pack modal
                    
                    savePack(); // Save new packs in array
                    displayPack(); // display Pack in table

                    $('#type, #packNumber, #inner_packs, #length, #width, #height, #weight, #volume, #description').val(''); //Reset all the packs input in modal
                
                } else{
                    console.log(unvalidValue);
                    $('#packAlert').removeClass('hide');
                    $("#packAlert").html("The following values are not valid: " + unvalidValue);

                }

            });

        });
    </script>

@stop

