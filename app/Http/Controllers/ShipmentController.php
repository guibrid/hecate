<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipment;
use App\Order;
use App\Transshipment;

class ShipmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Ajaxcall to list shipments.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function listShipments(Request $request)
    {
       
       $order_id = $request->order_id;

        if (is_null($order_id)){
            $shipments = Shipment::with(['orders'])->orderby('id', 'desc')->get();
        } else {
            $shipments = Shipment::with(['orders'])
            ->whereHas('orders', function($query) use ($order_id) {
                        $query->where('id', $order_id);})
            ->get();
        }

        return view('admin/shipments/listShipments')->with(['shipments'=> $shipments, 'order_id'=> $order_id]);
    }
}
