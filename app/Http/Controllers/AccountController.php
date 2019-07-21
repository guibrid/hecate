<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Http\Requests\StoreAccount;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class AccountController extends Controller
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
     * Display a schedule page.
     *
     * @return \Illuminate\Http\Response
     */
    public function schedule()
    {
        
        $account = Account::first();
        
        return view('admin/accounts/schedule')->with(['account'=> $account]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAccount $request, $id)
    {
        $account = Account::find($id);

        //si non vide on supprime le fichier avant upload
        if(!empty($account->schedule_file)){
            Storage::delete($account->schedule_file);
        }
        $file = Storage::putFileAs('schedules', $request->schedule_file, time().'__.pdf');
        $account->schedule_file = $file;
        $account->save();

        return redirect('/admin/accounts/schedule')->with('success', 'New schedule uploaded');
    }

}
