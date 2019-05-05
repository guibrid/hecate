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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $shipments = Shipment::with(['transshipments'])
            ->orderBy('id', 'DESC')
            ->get();
        
        return view('admin/shipments/index')->with(['shipments'=> $shipments]);

    }
    
    /**
     * Show the form for creating orders details.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/shipments/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        var_dump($request->input());
        die;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/shipments/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

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
