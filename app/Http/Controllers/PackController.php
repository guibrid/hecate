<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pack;

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
        return view('orders/inc/packs')->with(['packs'=> $packs]);
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

        return response()->json(['success'=>'Your pack are saved']);

    }
}
