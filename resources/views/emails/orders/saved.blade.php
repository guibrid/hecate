@extends('layouts.email')

@section('content')

    <!-- Hero Image, Flush : BEGIN -->
    <tr>
        <td style="background-color: #2a3f54; text-align: center; padding-bottom: 30px;">
            <h1 style="margin: 20px 0 15px 0; font-family: sans-serif; font-size: 25px; line-height: 30px; color: #ffffff; font-weight: normal; text-align: center;">Your order has been updated</h1>
            <p style="margin: 0; color: #3aaee0; font-family: sans-serif; text-align: center; font-size: 12px;">Current status</p>
            <span  style="margin: 15px 0 20px 0;background: #3aaee0; border: 1px solid #3aaee0; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: inline-block; border-radius: 4px;">{{ $order['status']['title']}}</span>
        </td>
    </tr>
    <!-- Hero Image, Flush : END -->

    <tr>
        <td style="background-color: #ffffff; text-align: center;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style=" padding-top:25px;">
                <tr>
                    <td valign="top" style="text-align: center; padding: 0 10px;">
                        <p style="font-family: sans-serif; text-align: center; ">
                            <strong>Consignee</strong><br />        
                            @if ($order['recipient']) 
                                {{ $order['recipient']}}
                            @else
                                -
                            @endif</p>   
                    </td>
                    <td valign="top" style="text-align: center; padding: 0 10px;">
                        <p style="font-family: sans-serif; text-align: center; ">
                            <strong>Shipper/Supplier</strong><br />
                            @if ($order['supplier']) 
                                {{ $order['supplier']}}
                            @else
                                -
                            @endif
                        </p> 
                    </td>
                </tr>
            </table>
        </td>

    </tr>

    @if ($order['shipment'])
    <!-- Shipment : BEGIN -->
    <tr>
        <td style="padding: 20px 10px 20px 10px; background-color: #ffffff;">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td style="padding: 10px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: center">
                        <h1 style="margin: 0; font-family: sans-serif; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;">Shipment details</h1>
                        @if ($order['shipment']['title']) 
                            <h3 style="margin: 0; font-family: sans-serif; font-size: 19px; line-height: 25px; color: #333333; font-weight: normal;">{{ $order['shipment']['title']}}</h3>
                        @endif
                    </td>
                </tr>
            </table>

            @if ($order['shipment']['transshipments'])
            <!-- Transshipment : BEGIN -->
            @foreach($order['shipment']['transshipments'] as $transshipment)
            
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td valign="top" width="33%">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="text-align: center; padding: 0 10px;">
                                    <p style="font-family: sans-serif; text-align: center; ">
                                        <strong>Loading</strong><br />
                                        {{$transshipment['origin']['title']}}
                                    </p>  
                                    <p style="font-family: sans-serif; text-align: center;">
                                        <strong>Departure</strong><br />
                                        {{\Carbon\Carbon::parse($transshipment['departure'])->format('d/m/Y')}}
                                    </p> 
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="middle" width="33%">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="text-align: center; padding: 0 10px;">
                                    
                                    <img src="{{ asset('img/'.$transshipment['type'].'-freight.png')}}" width="50" height="50" alt="SEA FREIGHT" border="0" style="width: 100%; max-width: 50px; font-family: sans-serif; font-size: 15px; line-height: 15px;">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top" width="33%">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="text-align: center; padding: 0 10px;">
                                    <p style="font-family: sans-serif; text-align: center;">
                                        <strong>Discharge</strong><br />
                                        {{$transshipment['destination']['title']}}
                                    </p>  
                                    <p style="font-family: sans-serif; text-align: center;">
                                        <strong>Arrival</strong><br />
                                        {{\Carbon\Carbon::parse($transshipment['arrival'])->format('d/m/Y')}}
                                    </p> 
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top" width="100%" colspan="3">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="text-align: center; padding: 0 10px;">
                                    <p style="font-family: sans-serif; text-align: center; margin:0">
                                        <strong>Vessel</strong><br />
                                        {{$transshipment['vessel']}}
                                    </p>  
                                    
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            @endforeach
            <hr style="margin:20px auto; width: 50%; height:1px; border:0px; color: #555555; background-color: #555555;" />
            <!-- Transshipment : BEGIN -->
            @endif
            
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td valign="top" width="50%">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="text-align: center; padding: 0 10px;">
                                    <p style="font-family: sans-serif; ">
                                        <strong>Consol #</strong><br />
                                        @if ($order['shipment']['number']) 
                                            {{ $order['shipment']['number'] }}
                                        @else
                                            -
                                        @endif
                                    </p>  
                                    <p style="font-family: sans-serif;">
                                        <strong>Container #</strong><br />
                                        @if ($order['shipment']['container_number']) 
                                            {{ $order['shipment']['container_number'] }}
                                        @else
                                            -
                                        @endif
                                    </p>
                                    <p style="font-family: sans-serif;">
                                        <strong>Cutoff</strong><br />
                                        @if ($order['shipment']['cutoff']) 
                                            {{ \Carbon\Carbon::parse($order['shipment']['cutoff'])->format('d/m/Y') }}
                                        @else
                                            -
                                        @endif
                                    </p>  
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top" width="50%">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="text-align: center; padding: 0 10px;">
                                    <p style="font-family: sans-serif; ">
                                        <strong>Doc reception</strong><br />
                                        @if ($order['shipment']['document_reception']) 
                                            {{ \Carbon\Carbon::parse($order['shipment']['document_reception'])->format('d/m/Y') }}
                                        @else
                                            -
                                        @endif
                                    </p>  
                                    <p style="font-family: sans-serif;">
                                        <strong>Custom control</strong><br />
                                        @if ($order['shipment']['custom_control']) 
                                            {{ \Carbon\Carbon::parse($order['shipment']['custom_control'])->format('d/m/Y') }}
                                        @else
                                            -
                                        @endif
                                    
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    @endif
    <!-- Shipment : END -->

    @if ($order['documents'])
    <!-- Documents : BEGIN -->
    <tr>
        <td style="background-color: #ffffff;">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                        <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 22px; color: #333333; font-weight: bold;">Your documents</h2>
                        <ul style="padding: 0; margin: 0 0 10px 0; list-style-type: disc;">
                            @foreach($order['documents'] as $document) 
                                <li style="margin:0 0 10px 30px;">
                                <a href="{{ env('APP_URL') }}/documents/download/{{$document['id']}}">{{$document['title']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- Documents : END -->
    @endif

    <!-- Order details : BEGIN -->
    <tr>
        <td style="padding: 30px 10px 20px 10px; background-color: #ffffff;">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td style="padding: 10px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: center">
                        <h1 style="margin: 0; font-family: sans-serif; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;">Order details</h1>
                        <h3 style="margin: 0; font-family: sans-serif; font-size: 19px; line-height: 25px; color: #333333; font-weight: normal;">{{ $order['title'] }}</h3>
                    </td>
                </tr>
            </table>
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td valign="top" width="50%" style="text-align: center; padding: 0 10px;">
                        <p style="font-family: sans-serif; ">
                            <strong>Booking #</strong><br />
                            @if ($order['number']) 
                                {{ $order['number']}}
                            @else
                                -
                            @endif
                        </p>  
                        <p style="font-family: sans-serif;">
                            <strong>B/L & HAWB #</strong><br />
                            @if ($order['bl_number']) 
                                {{ $order['bl_number']}}
                            @else
                                -
                            @endif
                        </p>
                        <p style="font-family: sans-serif;">
                            <strong>Order #</strong><br />
                            @if ($order['order_number']) 
                                {{ $order['order_number']}}
                            @else
                                -
                            @endif
                        </p>
                        <p style="font-family: sans-serif;">
                            <strong>Batch #</strong><br />
                            @if ($order['batch']) 
                                {{ $order['batch']}}
                            @else
                                -
                            @endif
                        </p>  
                        <p style="font-family: sans-serif; ">
                            <strong>Shipment mode</strong><br />
                            @if ($order['load']) 
                                {{ strtoupper($order['load'])}}
                            @else
                                -
                            @endif
                        </p>  
                    </td>
                    <td valign="top" width="50%" style="text-align: center; padding: 0 10px;">
                        <p style="font-family: sans-serif;">
                            <strong>Package #</strong><br />
                            @if ($order['package_number']) 
                                {{ $order['package_number']}}
                            @else
                                -
                            @endif
                        </p>
                        <p style="font-family: sans-serif; ">
                            <strong>Weight</strong><br />
                            @if ($order['weight']) 
                                {{ $order['weight']}} Kg
                            @else
                                -
                            @endif
                        </p>  
                        <p style="font-family: sans-serif;">
                            <strong>Volume</strong><br />
                            @if ($order['volume']) 
                                {{ $order['volume']}} m3
                            @else
                                -
                            @endif
                        </p>
                        <p style="font-family: sans-serif;">
                            <strong>Value</strong><br />
                            @if ($order['value']) 
                                {{ $order['value']}}
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- Order detail : END -->

    <!-- Comments : BEGIN -->
    <tr>
        <td style="background-color: #ffffff;">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                        <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 22px; color: #333333; font-weight: bold;">Comments</h2>
                        @if ($order['comment'])
                            <p style="font-family: sans-serif;">{{ $order['comment'] }}</p>
                        @endif
                        @if ($order['shipment']['comment']) 
                            <p style="font-family: sans-serif;">{{ $order['shipment']['comment'] }}</p>
                        @endif
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- Comments : END -->

@endsection