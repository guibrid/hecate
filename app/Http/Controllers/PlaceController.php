<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Http\Requests\StorePlace;

class PlaceController extends Controller
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
        
        $places = Place::orderBy('id', 'DESC')->get();
        
        return view('admin/places/index')->with(['places'=> $places]);

    }

    /**
     * Show the form for creating orders details.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/places/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlace $request)
    {

        $place = new Place;
        $place->title = $request->title;
        $place->country = $request->country;
        $place->type = $request->type;
        $place->abbreviation = $request->abbreviation;
        $place->save();

        return redirect('/admin/places')->with('success', 'New place saved!');
        
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
        $place = Place::find($id);
        return view('admin/places/edit')->with('place', $place);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePlace $request, $id)
    {
        $place = Place::find($id);
        $place->title = $request->title;
        $place->country = $request->country;
        $place->type = $request->type;
        $place->abbreviation = $request->abbreviation;
        $place->save();

        return redirect('/admin/places')->with('success', 'Place updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::find($id);
        $place->delete();

        return redirect('/admin/places')->with('success', 'Place has been deleted');
    }
}
