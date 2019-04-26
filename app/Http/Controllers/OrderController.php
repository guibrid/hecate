<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Transshipment;
use App\Customer;
use App\Status;
use Carbon\Carbon;
use App\Http\Requests\StoreOrder;
use Auth;

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
        
        $orders = Order::with(['customer','shipment','status'])
        ->where($args)
        ->orderBy('id', 'DESC')
        ->get();
        
        return view($views)->with(['orders'=> $orders]);

    }

    /**
     * Show the form for creating a new resource.
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
        $order->status_id = $request->input('status_id');
        $order->customer_id = $request->input('customer_id');
        $order->save();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
