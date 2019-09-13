@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Edit order</h3>
    </div>
</div>

<div class="clearfix"></div>
{!! Form::open(['action' => ['OrderController@update', $order->id], 
'method' => 'patch', 
'class' => 'form-horizontal form-label-left', 
'id' => 'demo-form2',
'files' => true]) !!}

{!! Form::hidden('customer_id', $order->customer_id, ['id'=>'customer_id']) !!}

{!! Form::hidden('customer', $order->customer->name, ['id'=>'customer']) !!}
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

        <div class="x_content">
                <p><small>* indicates required field</small></p>
                    <!-- Content-->
                    <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="x_title">
                                    <h2>Order details</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Status *</td>
                                        <td>
                                            {!! Form::select('status_id', $statuses, $order->status_id, ['id'=>'status_id', 'class'=>'form-control']) !!}
                                            @error('number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Booking n° *</td>
                                        <td>
                                            {!! Form::text('number', $order->number, ['id'=>'number', 'class'=>'form-control', 'placeholder' => 'Ex: Title for you order...']) !!}
                                            @error('number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Shipper/Supplier *</td>
                                        <td class="fs15 fw700 text-right">
                                            {!! Form::text('supplier', $order->supplier, ['id'=>'supplier', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                            @error('supplier')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Consignee *</td>
                                        <td class="fs15 fw700 text-right">
                                            {!! Form::text('recipient', $order->recipient, ['id'=>'recipient', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                            @error('recipient')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Order n°</td>
                                        <td>
                                            {!! Form::text('order_number', $order->order_number, ['id'=>'order_number', 'class'=>'form-control']) !!}
                                            @error('order_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>
                                            {!! Form::text('title', $order->title, ['id'=>'title', 'class'=>'form-control', 'placeholder' => 'Ex: Title for you order...']) !!}
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>B/L & HAWB n°</td>
                                        <td class="fs15 fw700 text-right">
                                            {!! Form::text('bl_number', $order->bl_number, ['id'=>'bl_number', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                            @error('bl_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Batch n°</td>
                                        <td class="fs15 fw700 text-right">
                                            {!! Form::text('batch', $order->batch, ['id'=>'batch', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                            @error('batch')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Shipment mode</td>
                                        <td class="fs15 fw700 text-right">
                                            @php  if(empty($order->load)) { $order->load = null; } else { $order->load = strtolower($order->load); } @endphp
                                            {!! Form::select('load', config('variables.form.shipmentModes'), $order->load, ['id'=>'load', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Pick a shipment type...']) !!}
                                            @error('load')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Value</td>
                                        <td class="fs15 fw700 text-right">
                                            {!! Form::text('value', $order->value, ['id'=>'value', 'class'=>'form-control col-md-7 col-xs-12',  'placeholder' => 'Ex: 10564.76']) !!}
                                            @error('value')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="x_title">
                                    <h2>Documents</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div id="showDocuments"></div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#documentModal" id="addNewDoc"><i class="fa fa-paperclip"></i> Add document</button>
                                </div>
                            </div>
                        </div>
                        <div class="hidden-small"><br /><br /></div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
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
                        <div class="hidden-small"><br /><br /></div>
                        <div class="row">
                          <div class="col-md-12 col-xs-12">
                              <div class="x_title">
                                <h2>Shipping details</h2>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <div id="showShipment"></div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shipmentModal" id="listShipmentButton"><i class="fa fa-ship"></i> Assign shipment</button>
                                <div id="assignShipment"></div>
                            </div>                                            
                                  
                              
                          </div>
                        </div>
                        <div class="hidden-small"><br /><br /></div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="x_title">
                                <h2>Comments</h2>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                    {!! Form::textarea('comment', $order->comment, ['class' => 'resizable_textarea form-control', 'rows' => 3, 'id' => 'comment', 'placeholder' =>'Your comments here...']) !!}
                                    @error('comment')
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

<!-- End Document section -->
<!--<div class="ln_solid"></div>-->
<div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                <br />
            <p>
                {!! Form::checkbox('notification', 'send_notification', true, ['class' => 'js-switch']) !!} 
                Send notification to customer   
            </p>
        </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        {!! Form::submit('Update your order', ['class' => 'btn btn-success triggerOverlay']) !!}
        <br /><br />  <br />           
    </div>
</div>

{!! Form::close() !!}

@include('admin.orders.modal.document')
@include('admin.orders.modal.shipment')
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
        <!-- Datatables -->
        <script src="{{ asset('bower_components/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script type="text/javascript">
        
        
        $(document).ready(function() {

            getDocuments("{{ $order->id}}") // Ajax call to get documents displayed
            getShipments("{{ $order->id}}")
            getPacks("{{ $order->id}}")

            // Active document modal
            $('#addNewDoc').click(function(){ 
                $('.myprogress').css('width', '0');
            });

            // Add document fields form
            $("#addDocument").click(function(){ 
                var html = $(".clone").html();
                $(".increment").append(html);
            });

            $("body").on("click",".remove-fields",function(){ 
                $(this).parents(".filegroup").remove();
            });

            $("#submitDocuments").click(function(e){ 
                e.preventDefault()
                if (checkEmptyInputs() == false)
                    $(".progress").removeClass('hide');
                    storeDocuments()   
            });

            $('#listShipmentButton').click(function(e){ 
                e.preventDefault()
                getShipments()
            });

            $("#registerShipment").click(function(e){ 
                e.preventDefault()
                updateShipment("{{ $order->id}}")
            });

            $('#packsTable-responsive').DataTable( {
                paging: false,
                searching: false,
                ordering:  false,
                info:false
            });

            $("#registerPack").click(function(e){ 
                e.preventDefault()
                storePack("{{ $order->id}}")
            });

        });

        function getPacks(order_id){

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            $.ajax({
                type: 'post',
                url: "{{ url('/getPacks') }}",
                data: {order_id:order_id},
                success:function(data){
                    $("#packsTable-responsive tbody").html(data);
                }
            });
        }

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

        function storePack(order_id){
            let notEmpty = [$('#packNumber').val()]
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

            notEmpty.forEach(Val => {
                    if (Val == ''){
			            validator = false;
                        unvalidValue.push('One of the requiered field is empty'); 
		            }
            });

            if(validator){

                //***************
                //ENREGISTREMENT D'UN NOUVEAU PACK
                var data = new FormData();
                $("form#addPackForm :input[type=text], form#addPackForm select").each(function( index, value ){
                    data.append(value.name, value.value.replace(",", "."));
                });
                data.append('order_id', "{{ $order->id }}");

                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                $.ajax({
                    type: 'post',
                    url: "{{ url('/admin/packs/store') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success:function(response){

                        if($.isEmptyObject(response.error)){

                            $('#packModal').modal('toggle'); // Close document modal
                            getPacks("{{ $order->id}}") // Reload Ajax call to get new packs displayed

                        }else{

                            alert(response.error);

                        }

                    }
                });

            } else {
                $('#packAlert').removeClass('hide');
                $("#packAlert").html("The following values are not valid: " + unvalidValue);
            }

            

        }

        function getDocuments(order_id){

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            $.ajax({
                type: 'post',
                url: "{{ url('/getDocuments') }}",
                data: {order_id:order_id},
                success:function(data){
                    $("#showDocuments").html(data);
                }
            });
        }

        function getShipments(order_id = null){

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            $.ajax({
                type: 'get',
                url: "{{ url('/listShipments') }}",
                data: {order_id:order_id},
                success:function(response){
                    
                    if (order_id == null){
                        $("#listShipments").html(response);
                    } else {
                        $("#showShipment").html(response);
                    }
                }
            });
        }

        function storeDocuments(order_id){

            var data = new FormData();
            var filename = [];
            var fileInputs = $("input[name='documents[]']").slice(0, -1) // Delete the last empty element
            var filenameInputs = $("input[name='filenames[]']").slice(0, -1) // Delete the last empty element
            // Initializing array with Checkbox checked values
            fileInputs.each(function( index, value ){

                data.append(index, this.files[0]);
                filename[index] =  filenameInputs[index].value;

            });

            data.append('filename', JSON.stringify(filename));
            data.append('order_id', "{{ $order->id }}");
            data.append('customer_id', "{{ $order->customer_id }}");

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            $.ajax({
                type: 'post',
                url: "{{ url('/admin/documents/store') }}",
                processData: false,
                contentType: false,
                data: data,
                xhr: function () { // this part is progress bar
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            $('.myprogress').text(percentComplete + '%');
                            $('.myprogress').css('width', percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                success:function(response){

                    if($.isEmptyObject(response.error)){

                        $('#documentModal').modal('toggle'); // Close document modal
                        getDocuments("{{ $order->id}}") // Reload Ajax call to get new documents displayed
                    
                    }else{

                        alert(response.error);

                    }
                }
            });
        }

        function updateShipment(order_id){
            var shipment_id = $('input[name=shipment_id]:checked').val();
            
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            $.ajax({
                type: 'post',
                url: "{{ url('/updateShipment') }}",
                data: {order_id:order_id,shipment_id:shipment_id},
                success:function(response){
                    //$("#loading").html(response);
                    $('#shipmentModal').modal('toggle'); // Close document modal
                    getShipments("{{ $order->id}}")
                }
            });
        }
        

        function ValidateFile(file) {
            
            var FileSize = file.files[0].size / 1024 / 1024; // in MB
            var MineType = [
                'image/jpeg',
                'image/gif',
                'image/png',
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ];
            $(file).parent('.fileInput').next('div.alert').remove();
            if (FileSize > 2) {
                $(file).parent('.fileInput').after( '<div class="alert alert-danger"><p>File size max 2Mo</p></div>' );
            }
            if ($.inArray( file.files[0].type,MineType) < 0) {
                $(file).parent('.fileInput').after( '<div class="alert alert-danger"><p>File type not authorize</p></div>' );
            }
        }

        //TODO Utiliser la fonction checkEmptyInputs de la view Shipments>create.blade.php
        function checkEmptyInputs() {

            var empty = false;     // Initiate empty to false

            $("#loading").next( 'div.alert' ).remove(); // Reset le danger alert

            // Loop all documents fields to find empty ones
            $("input[name='documents[]']").slice(0, -1).each(function( index, value ){
                if(this.files[0]  == null) 
                    empty = true;
            });

            // Loop all documents fields to find empty ones
            $("input[name='filenames[]']").slice(0, -1).each(function( index, value ){
                if(this.value  == '') 
                    empty = true;
                
            });

            // Display alert if one field is empty
            if (empty == true)
                $("#loading").after( '<div class="alert alert-danger"><p>All Field required</p></div>' );

            return empty;
  
        }

    </script>

@stop
