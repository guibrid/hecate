<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Order;
use App\Http\Requests\StoreCustomer;

class CustomerController extends Controller
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
        
        $customers = Customer::with(['users'])->orderBy('id', 'DESC')->get();
        
        return view('admin/customers/index')->with(['customers'=> $customers]);

    }

    /**
     * Show the form for creating orders details.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/customers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomer $request)
    {

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->cp = $request->cp;
        $customer->country = $request->country;
        $customer->save();

        return redirect('/admin/customers')->with('success', 'New customer saved!');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the customer
        $customer = Customer::find($id);
        return view('admin/customers/edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomer $request, $id)
    {
        $customer = Customer::find($id);

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->cp = $request->cp;
        $customer->country = $request->country;
        $customer->save();

        return redirect('/admin/customers')->with('success', 'Customer updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::with('users')->find($id);
        $orders = Order::with('shipment', 'status', 'customer')
        ->where('customer_id', $id)        
        ->where(function ($query) {
            $query->where('delivery', '>=', \Carbon\Carbon::now()->subDays(30))
                  ->orWhereNull('delivery');
        })
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin/customers/show')->with(['customer' => $customer, 'orders' => $orders]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/admin/customers')->with('success', 'Customer has been deleted');
    }
}
