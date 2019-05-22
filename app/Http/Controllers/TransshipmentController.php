<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransshipmentController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $transshipment = Transshipment::find($id);
        $transshipment->delete();

        return back()->with('success', 'Transshipment deleted');

    }
}