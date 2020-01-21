@extends('layouts.email')

@section('content')

<tr>
    <td style="background-color: #2a3f54; text-align: center; padding-bottom: 30px;">
        <h1 style="margin: 20px 0 15px 0; font-family: sans-serif; font-size: 25px; line-height: 30px; color: #ffffff; font-weight: normal; text-align: center;">Incoming orders</h1>
        <p style="margin: 0; color: #FFFFFF; font-family: sans-serif; text-align: center; font-size: 15px;">The following orders will reach the destination in 2 days.</p>       
    </td>
</tr>
<tr>
    <td style="background-color: #ffffff; text-align: center;font-family: sans-serif; font-size: 11px;">
        <br />
        @foreach ($orders as $order) 
        <table style="width:100%; margin-bottom: 25px !important;">
            <tr>
                <td colspan="2"><b>Consignee</b></td>
                <td colspan="2"><b>Shipper/Supplier</b></td>
            </tr>
            <tr><td colspan="2">{{ $order->recipient }}</td><td colspan="2">{{ $order->supplier}}</td></tr>
            <tr>
                <td><b>Booking #</b></td>
                <td><b>Consol #</b></td>
                <td><b>Discharge</b></td>
                <td><b>Date</b></td>
            </tr>
            <tr>
                <td>{{ $order->number }}</td>
                <td>{{ $order->shipment['number']}}</td>
                @php
                    if ($order['shipment']['transshipments']){
                        $transshipment =$order['shipment']['transshipments']->last();
                        echo "<td>".$transshipment['destination']['title']."</td>";
                        echo "<td>".\Carbon\Carbon::parse($transshipment['arrival'])->format('d/m/Y')."</td>";
                    } else {
                        echo "<td></td><td></td>";
                    }
                    @endphp

            </tr>
            <tr>
                <td colspan="4"style="text-align:center"><a href="{{ env('APP_URL') }}" style="color:#337abe; display:inline-block; border-bottom:1px solid #cccccc; width:70%; padding-bottom:25px">More details</a></td>
            </tr>
        </table>   
        @endforeach
    </td>
</tr>

@endsection