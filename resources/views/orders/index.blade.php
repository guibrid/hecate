@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
     
            <h3>All orders</h3>

        </div>
        <div class="x_content">
          <p><small>Click on order to see details</small></p>

          @foreach ($orders as $order)
          @php 
            $transshipment_comment = null; 
            $shipment_comment = null;
          
          @endphp

          <!-- start accordion -->
          <div class="accordion" id="accordion{{$order->id}}" role="tablist" aria-multiselectable="true">
            <div class="panel">
              <a class="panel-heading collapsed" role="tab" id="heading{{$order->id}}" data-toggle="collapse" data-parent="#accordion{{$order->id}}" href="#collapse{{$order->id}}" aria-expanded="false" aria-controls="collapse{{$order->id}}">
                <div class="row">
                  <div class="col-md-6">
                    <h4 class="panel-title"><i class="fa fa-caret-down"></i> Booking n°: {{$order->number}} | {{$order->supplier}}</h4>
                  </div>
                  <div class="col-md-6">
                    <div class="pull-right"><span class="label label-info" style="width:80px; height:15px; display:inline-block">{{$order->status['title']}}</span>  @php echo Helpers::renderShipmentStatus($order->shipment); @endphp </div>
                  </div>
                </div>
              </a>
              <div id="collapse{{$order->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$order->id}}">
                <div class="panel-body">
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
                                    <td>Shipper/Supplier</td>
                                    <td class="fs15 fw700 text-right">{{$order->supplier}}</td>
                                  </tr>
                                  <tr>
                                    <td>Consignee</td>
                                    <td class="fs15 fw700 text-right">{{$order->recipient}}</td>
                                  </tr>
                                  <tr>
                                    <td>B/L & HAWB n°</td>
                                    <td class="fs15 fw700 text-right">{{$order->bl_number}}</td>
                                  </tr>
                                  <tr>
                                    <td>Batch n°</td>
                                    <td class="fs15 fw700 text-right">{{$order->batch}}</td>
                                  </tr>
                                  <tr>
                                    <td>Shipment Mode</td>
                                    <td class="fs15 fw700 text-right">{{strtoupper($order->load)}}</td>
                                  </tr>
                                  <tr>
                                    <td># of packages</td>
                                    <td class="fs15 fw700 text-right">{{$order->package_number}}</td>
                                  </tr>
                                  <tr>
                                    <td>Weight</td>
                                    <td class="fs15 fw700 text-right">{{$order->weight}}kg</td>
                                  </tr>
                                  <tr>
                                    <td>Volume</td>
                                    <td class="fs15 fw700 text-right">{{$order->volume}}m3</td>
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
                                <div id="showDocuments{{$order->id}}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden-small"><br /><br /></div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="x_title">
                            <h2>Shipping details</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <div class="row">

                                @if ($order->shipment)
                                    @php  
                                    $shipment_comment = $order->shipment->comment;
                                    @endphp
                                    <div class="col-md-6">
                                        <table class="table">
                                        <tbody>Shipment/booking number
                                            <tr>
                                              <td>Consol n°</td>
                                              <td class="fs15 fw700 text-right">{{date('d-m-Y', strtotime($order->shipment->document_reception))}}</td>
                                            </tr>
                                            <tr>
                                            <td>Doc reception</td>
                                            <td class="fs15 fw700 text-right">{{date('d-m-Y', strtotime($order->shipment->document_reception))}}</td>
                                            </tr>
                                            <tr>
                                            <td>Custom control</td>
                                            <td class="fs15 fw700 text-right">{{date('d-m-Y', strtotime($order->shipment->custom_control))}}</td>
                                            </tr>
                                            <tr>
                                            <td>Cutoff</td>
                                            <td class="fs15 fw700 text-right">{{date('d-m-Y', strtotime($order->shipment->cutoff))}}</td>
                                            </tr>
                                            <tr>
                                            <td>Container n°</td>
                                            <td class="fs15 fw700 text-right">{{$order->shipment->container_number }}</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                        @foreach ($order->shipment->transshipments as $transshipment)
                                            @php  
                                                echo Helpers::transshipmentDiv($transshipment, count($order->shipment->transshipments));
                                                if ($transshipment->comment){
                                                  $transshipment_comment .= $transshipment->comment.'. ';
                                                }
                                            @endphp 
                                        @endforeach
                                @else

                                    <div class="col-md-12">
                                        <p>No shipment has been registered yet for this order.</p>
                                    </div>

                                @endif

                            </div>
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
                              @if ($order->comment)
                              <p><b>Order comment:</b> {{$order->comment}}</p>
                              @endif
                              @if ($shipment_comment)
                              <p><b>Shipment comment:</b> {{$shipment_comment}}</p>
                              @endif
                              @if ($transshipment_comment)
                                <p><b>Transshipment comment:</b> {{$transshipment_comment}}</p>
                              @endif
                          </div>                                            
                              
                          
                      </div>
                    </div>
                    


                    <!-- End content-->
                </div>
                <!-- end panel-body -->
              </div>
              <!-- end panel -->
            </div>

          </div>
          <!-- end of accordion -->
          @endforeach

        </div>
      </div>
    </div>
  </div>

@endsection

<!-- CSS require for this view -->
@section('viewCSS')

@stop

<!-- Script require for this view -->
@section('viewScripts')



<script>
  function ajaxCall(order_id){

  $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });

  $.ajax({
      type: 'post',
      url: "{{ url('/getDocuments') }}",
      data: {order_id:order_id},
      success:function(data){
          $("#showDocuments"+order_id).html(data);
      }
  });
  }
</script>
@foreach ($orders as $order)
  <script>ajaxCall("{{ $order->id}}");</script>
@endforeach
@stop