<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipment;
use App\Order;
use App\Transshipment;
use App\Http\Requests\StoreShipment;
use Carbon\Carbon;

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
    public function store(StoreShipment $request)
    {

        // Save Shipment
        $shipment = new Shipment;
        $shipment->number = $request->number;
        $shipment->title = $request->title;
        $shipment->container_number = $request->container_number;
        $shipment->document_reception = $request->document_reception;
        $shipment->custom_control = $request->custom_control;
        $shipment->cutoff = $request->cutoff;
        $shipment->comment = $request->comment;
        $shipment->save();

        $transshipments = json_decode ($request->transshipments, true); // Decode the JSOn Stringify

        // Loop Transshipments
        foreach($transshipments as $key => $transshipmentInputs){
            //TODO add validation on transshipment fields
            // Save Shipment
            $transshipment = new Transshipment;
            $transshipment->type = $transshipmentInputs['type'];
            $transshipment->departure = Carbon::createFromFormat('d/m/Y', $transshipmentInputs['departure'])->format('Y-m-d');
            $transshipment->arrival = Carbon::createFromFormat('d/m/Y', $transshipmentInputs['arrival'])->format('Y-m-d');
            $transshipment->vessel = $transshipmentInputs['vessel'];
            $transshipment->comment = $transshipmentInputs['comment'];
            $transshipment->origin_place = $transshipmentInputs['origin_place'];
            $transshipment->destination_place = $transshipmentInputs['destination_place'];
            $transshipment->shipment_id = $shipment->id;
            $transshipment->save();
        }

        return redirect('/admin/shipments')->with('success', 'New shipment saved!');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipment = Shipment::find($id);
        $transshipments = Transshipment::with(['origin', 'destination'])->where('shipment_id', $id)->get();

        return view('admin/shipments/edit')->with(['shipment' => $shipment, 'transshipments' => $transshipments->toJson()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreShipment $request, $id)
    {
        //Update shimpents details
        $shipment = Shipment::find($id);
        $shipment->number = $request->number;
        $shipment->title = $request->title;
        $shipment->container_number = $request->container_number;
        $shipment->document_reception = $request->document_reception;
        $shipment->custom_control = $request->custom_control;
        $shipment->cutoff = $request->cutoff;
        $shipment->comment = $request->comment;
        $shipment->save();
        
        $transshipments = json_decode ($request->transshipments, true); // Decode the JSOn Stringify

        foreach($transshipments as $transshipmentInputs){
      
            if(isset($transshipmentInputs['id'])){  //if is update TransShipment
                $transshipment = Transshipment::find($transshipmentInputs['id']);
            } else {    // if is Insert TransShipment
                $transshipment = new Transshipment;
            }
            $transshipment->type = $transshipmentInputs['type'];
            $transshipment->departure = Carbon::createFromFormat('d/m/Y', $transshipmentInputs['departure'])->format('Y-m-d');
            $transshipment->arrival = Carbon::createFromFormat('d/m/Y', $transshipmentInputs['arrival'])->format('Y-m-d');
            $transshipment->vessel = $transshipmentInputs['vessel'];
            $transshipment->comment = $transshipmentInputs['comment'];
            $transshipment->origin_place = $transshipmentInputs['origin_place'];
            $transshipment->destination_place = $transshipmentInputs['destination_place'];
            $transshipment->shipment_id = $shipment->id;
            $transshipment->save();
            
        }

        return redirect('/admin/shipments')->with('success', 'Shipment updated');

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
