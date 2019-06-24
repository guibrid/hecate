<table id="ordersTable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Customer</th>
            <th>Consignee</th>
            <th>Shipper/Supplier</th>
            <th>Booking n°</th>
            <th>B/L & HAWB n°</th>
            <th>Status</th>
            <th>Shipment</th>
            <th>Shipment Mode</th>
            <th># packages</th>
            <th>Weight</th>
            <th>Volume</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)
          <tr>
                  <td>{{$order->customer->name}}</td>
                  <td>{{$order->recipient}}</td>
                  <td>{{$order->supplier}}</td>
                  <td>{{$order->number}}</td>
                  <td>{{$order->bl_number }}</td>
                  <td>{{$order->status->title}}</td>
                  <td>@php echo Helpers::renderShipmentStatus($order->shipment); @endphp</td>
                  <td>{{strtoupper($order->load)}}</td>
                  <td>{{$order->package_number}}</td>
                  <td>@if ($order->weight) {{$order->weight}} kg @endif</td>
                  <td>@if ($order->volume) {{$order->volume}} m3 @endif</td>
                  <td>
                    {{ Form::open(['method'=>'DELETE', 'route'=>['order.delete', $order->id]]) }}
                    <a href="{{ URL::route('order.edit', $order->id) }}" type="button" class="btn btn-primary btn-xs">edit</a> 
                    <input class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this order?');" type="submit" value="Del"> 
                    {{ Form::close() }}
                  </td>

                </tr>
          @endforeach

        </tbody>
      </table>