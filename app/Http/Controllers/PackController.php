<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pack;
use App\Order;

class PackController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $pack = Pack::find($id);
        $pack->delete();

        //update Orders Weight/Volume/package sum
        $sum   = Pack::selectRaw('SUM(volume) AS volume, SUM(weight) AS weight, SUM(number) AS packs')
        ->where('order_id', $pack->order_id)->first();

        $order = Order::find($pack->order_id);
        $order->package_number = $sum->packs;
        $order->weight = $sum->weight;
        $order->volume = $sum->volume;
        $order->save();

        return back()->with('success', 'Pack deleted');
        
    }

    /**
     * Ajaxcall to Display Packs available for an order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getPacks(Request $request)
    {
        //TODO Ajouter la verification du user, si il appartient bien au customer associé à cette order
        $packs = Pack::where('order_id', $request->order_id)->get();
        $sum   = Pack::selectRaw('SUM(volume) AS volume, SUM(weight) AS weight, SUM(number) AS packs')
                            ->where('order_id', $request->order_id)->first();

        return view('orders/inc/packs')->with(['packs'=> $packs, 'sum'=>$sum ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pack = new Pack;
        $pack->type = $request->type;
        $pack->number = $request->packNumber;
        $pack->inner_packs = $request->inner_packs;
        $pack->length = $request->length;
        $pack->width = $request->width;
        $pack->height = $request->height;
        $pack->weight = $request->weight;
        $pack->volume = $request->volume;
        $pack->description = $request->description;
        $pack->order_id = $request->order_id;
        $pack->save();

        //update Orders Weight/Volume/package sum
        $sum   = Pack::selectRaw('SUM(volume) AS volume, SUM(weight) AS weight, SUM(number) AS packs')
                        ->where('order_id', $request->order_id)->first();

        $order = Order::find($request->order_id);
        $order->package_number = $sum->packs;
        $order->weight = $sum->weight;
        $order->volume = $sum->volume;
        $order->save();

        return response()->json(['success'=>'Your pack are saved']);

    }
}
