<h1>Orders Recap</h1>
@foreach($orders as $order)
    @php $comments = [] @endphp
   <table style="border:1px solid black; width:100%">
        @if ($order->title)
            <tr><td colspan="4"><h2>{{$order->title}}</h2></td></tr>
        @endif
        <tr><td colspan="4"><b>Booking n°:</b> {{$order->number}}</td><td></td></tr>
        <tr><td colspan="4"><b>Status :</b> {{$order->status->title}}</td></tr>
        <tr><td colspan="4"><b>Shipper/Supplier :</b> {{$order->supplier}}</td></tr>
        <tr><td colspan="4"><b>Consignee :</b> {{$order->recipient}}</td></tr>
        <tr><td colspan="4"><b>B/L & HAWB n° :</b> {{$order->bl_number}}</td></tr>
        <tr style="text-align:center">
            <td><b>Batch n°</b></td>
            <td><b>Shipment mode</b></td>
            <td><b># of packages</b></td>
            <td><b>Weight</b></td>
            <td><b>Volume</b></td>
        </tr>
        <tr style="text-align:center">
            <td>{{$order->batch}}</td>
            <td>{{$order->load}}</td>
            <td>{{$order->package_number}}</td>
            <td>{{$order->weight}}</td>
            <td>{{$order->volume}}</td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        @if (!empty($order->comment)) 
                @php $comments[] = $order->comment @endphp
        @endif
        @if ($order->shipment)
            <tr><td colspan="4"> <h3>Shipment {{$order->shipment->title}}</h3></td></tr>
            <tr style="text-align:center">
                <td><b>Consol #</b></td>
                <td><b>Container #</b></td>
                <td><b>Document reception</b></td>
                <td><b>Custom control</b></td>
                <td><b>Cutoff</b></td>
                <td></td>

            </tr>
            <tr style="text-align:center">
                <td>{{$order->shipment->number}}</td> 
                <td>{{$order->shipment->container_number}}</td> 
                <td>{{ \Carbon\Carbon::parse($order->shipment->document_reception)->format('d/m/Y') }}</td> 
                <td>{{ \Carbon\Carbon::parse($order->shipment->custom_control)->format('d/m/Y') }}</td> 
                <td>{{ \Carbon\Carbon::parse($order->shipment->cutoff)->format('d/m/Y') }}</td>
                <td></td> 
            </tr>
            @if (!empty($order->shipment->comment)) 
                @php $comments[] = $order->shipment->comment @endphp
            @endif
            <tr><td>&nbsp;</td></tr>
            @if ($order->shipment->transshipments)
                <tr style="text-align:center">
                    <td><b>Type</b></td>
                    <td><b>Vessel</b></td>
                    <td><b>Origin</b></td>
                    <td><b>Departure</b></td>
                    <td><b>Destination</b></td>
                    <td><b>Arrival</b></td>
                </tr>
                @foreach ($order->shipment->transshipments as $transshipment)
                    <tr style="text-align:center">
                        <td>{{$transshipment->type}}</td>
                        <td>{{$transshipment->vessel}}</td>
                        <td>{{$transshipment->origin->title}}</td>
                        <td>{{ \Carbon\Carbon::parse($transshipment->departure)->format('d/m/Y') }}</td>
                        <td>{{$transshipment->destination->title}}</td>
                        <td>{{ \Carbon\Carbon::parse($transshipment->arrival)->format('d/m/Y') }}</td>
                    </tr>
                    @if (!empty($transshipment->comment)) 
                        @php $comments[] = $transshipment->comment @endphp
                    @endif
                @endforeach
            @endif
        @else 
            <tr><td><p>No shipment registered yet</p></td></tr>
        @endif
        
        <tr><td><br /><h3>Comments</h3>@foreach ($comments as $comment)
            - {{$comment}}<br />
        @endforeach</td></tr>
        <tr><td>
            
        </td></tr>
    </table>


@endforeach