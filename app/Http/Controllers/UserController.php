<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\VerifyUser;
use App\Role;
use App\Mail\VerifyMail;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Str;


class UserController extends Controller
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
        
        $users = User::with(['customer', 'roles'])->orderBy('id', 'DESC')->get();
        
        return view('admin/users/index')->with(['users'=> $users]);

    }

    /**
     * Show the form for creating orders details.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {

        $validatedData = $request->validate([
            'name_user' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $user = new User;
        $user->name = $request->name_user;
        $user->email = $request->email;
        $user->password = Hash::make(Str::random(8));
        $user->customer_id = $request->customer_id;
        $user->save();

        $verifyUser = new VerifyUser;
        $verifyUser->user_id = $user->id;
        $verifyUser->token = sha1(time());
        $verifyUser->save();

        if(isset($request->role)) {
            $user->roles()->attach($request->role); // Assign  'User' role array
        } else {
            $user->roles()->attach(Role::where('id', 1)->first()); // Assign default 'User' role to new user
        }

        \Mail::to($user->email)->send(new VerifyMail($user));
        //$user->sendEmailVerificationNotification();

        return redirect('/admin/customers/edit/'.$request->customer_id)->with('success', 'New user added!');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/users/edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, $id)
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
        $user = User::find($id);
        $user->delete();

        return back()->with('success', 'User has been deleted');
    }


}
