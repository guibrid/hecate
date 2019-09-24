<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Transshipment;
use App\Document;
use App\Customer;
use App\Helpers;
use App\Status;
use App\Pack;
use App\Http\Requests\StoreOrder;
use Auth;
use App\Jobs\SendNotification;

class OrderController extends Controller
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
        if (Auth::user()->authorizeDisplay('user')) {
            $args = ['customer_id'=> Auth::user()->customer_id];
            $views = 'orders/index';
        } else {
            $args = [];
            $views = 'admin/orders/index';
        }  
        
        $orders = Order::with(['customer', 'shipment', 'status' , 'shipment.transshipments' , 'shipment.transshipments.origin', 'shipment.transshipments.destination'])
        ->where($args)
        ->orderBy('id', 'DESC')
        ->where(function ($query) {
            $query->where('delivery', '>=', \Carbon\Carbon::now()->subDays(30))
                  ->orWhereNull('delivery');
        }) 
        ->get();
        
        
        return view($views)->with(['orders'=> $orders]);

    }

    /**
     * Show the form for creating orders details.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::select('id','name')->get()->toJson();
        $statuses = Status::pluck('title','id');
        return view('admin/orders/create')->with(['customers'=> $customers, 'statuses' => $statuses]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder $request)
    {

        // Save Order
        $order = new Order;
        $order->number = $request->input('number');
        $order->title = $request->input('title');
        $order->batch = $request->input('batch');
        $order->load = $request->input('load');
        $order->package_number = $request->input('package_number');
        $order->weight = $request->input('weight');
        $order->volume = $request->input('volume');
        $order->recipient = $request->input('recipient');
        $order->supplier = $request->input('supplier');
        $order->comment = $request->input('comment');
        $order->bl_number = $request->input('bl_number');
        $order->order_number = $request->input('order_number');
        $order->value = $request->input('value');
        $order->status_id = $request->input('status_id');
        // if status is Delivered,Set delivery date
        if ($order->status_id == 4) { $order->delivery = now(); }
        $order->customer_id = $request->input('customer_id');
        $order->save();
        
        //Save Packs
        $packs = json_decode ($request->packs, true); // Decode the JSOn Stringify
        // Loop Packs if exist
        if($packs){
            foreach($packs as $key => $packsInputs){
                $pack = new Pack;
                $pack->type = $packsInputs['type'];
                $pack->number  = $packsInputs['number'];
                $pack->inner_packs = $packsInputs['inner_packs'];
                $pack->length = $packsInputs['length'];
                $pack->width = $packsInputs['width'];
                $pack->height = $packsInputs['height'];
                $pack->weight = $packsInputs['weight'];
                $pack->volume = $packsInputs['volume'];
                $pack->description = $packsInputs['description'];
                $pack->order_id = $order->id;
                $pack->save();
            }

                //update Orders Weight/Volume/package sum
                $sum   = Pack::selectRaw('SUM(volume) AS volume, SUM(weight) AS weight, SUM(number) AS packs')
                ->where('order_id', $order->id)->first();

                $order = Order::find($order->id);
                $order->package_number = $sum->packs;
                $order->weight = $sum->weight;
                $order->volume = $sum->volume;
                $order->save();
        }

        // Send Notification
        if($request->input('notification')){
            // Get all new order details for notification
            $newOrder = Order::with(['customer','shipment','status','documents'])
                            ->where('id',$order->id)
                            ->first();
            // Send notification
            dispatch(new SendNotification($newOrder->toArray()));
        }
        
        return redirect('/admin/orders')->with('success', 'New order saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(['customer','shipment','status'])->where('id', 1)
        ->first();
        $transshipments = Transshipment::where('shipment_id', $order->shipment->id)
        ->with(['origin'])
        ->get();

        return view('orders/show')->with(['order'=> $order, 'transshipments'=> $transshipments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the order
        $order = Order::with(['customer'])->find($id);
        $statuses = Status::pluck('title','id');
        return view('admin/orders/edit')->with(['order' => $order, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrder $request, $id)
    {
        $order = Order::find($id);

        $order->number = $request->input('number');
        $order->title = $request->input('title');
        $order->batch = $request->input('batch');
        $order->load = $request->input('load');
        $order->package_number = $request->input('package_number');
        $order->weight = $request->input('weight');
        $order->volume = $request->input('volume');
        $order->recipient = $request->input('recipient');
        $order->supplier = $request->input('supplier');
        $order->comment = $request->input('comment');
        $order->bl_number = $request->input('bl_number');
        $order->order_number = $request->input('order_number');
        $order->value = $request->input('value');
        $order->status_id = $request->input('status_id');
        // if status is Delivered,Set delivery date
        if ($order->status_id == 4) { 
            $order->delivery = now(); 
        }else {
            $order->delivery = null;
        }
        $order->save();

        //update Orders Weight/Volume/package sum
        $sum = Pack::selectRaw('SUM(volume) AS volume, SUM(weight) AS weight, SUM(number) AS packs')
        ->where('order_id', $order->id)->first();

        $order = Order::find($order->id);
        $order->package_number = $sum->packs;
        $order->weight = $sum->weight;
        $order->volume = $sum->volume;
        $order->save();

        // Send Notification
        if($request->input('notification')){
            // Get all updated order details for notification
            $updatedorder = Order::with(['customer','shipment','status','documents', 'shipment.transshipments' , 'shipment.transshipments.origin', 'shipment.transshipments.destination'])->where('id', $order->id)
            ->first();
            // Send notification
            dispatch(new SendNotification($updatedorder->toArray()));
        }

        return redirect('/admin/orders')->with('success', 'Order updated');

    }

    /**
     * Update the shipment id in order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateShipment(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->shipment_id = $request->shipment_id;
        $order->save();

        return response()->json(['success'=>'Shipment updated']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/admin/orders')->with('success', 'Order has been deleted');
    }
}
