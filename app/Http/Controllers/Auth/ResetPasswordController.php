<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\VerifyUser;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUser;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display the password set view for new user.
     *
     *
     * @param  string  $email
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function SetFirstPassPassword(StoreUser $request)
    {
        $validatedData = $request->validate([
            'password' => ['required', 
                            'string', 
                            'min:8', 
                            'regex:/[a-z]/',      // must contain at least one lowercase letter
                            'regex:/[A-Z]/',      // must contain at least one uppercase letter
                            'regex:/[0-9]/',      // must contain at least one digit
                            'confirmed'],
        ]);
        
        $verifyUser = VerifyUser::where('token', $request->token)->first();
        // Check si le token est valide
        if(isset($verifyUser) ){

            //Save New Password
            $user = User::where('email', $request->email)->first();
            $user->password = Hash::make($request->password);
            $user->setRememberToken(Str::random(60));
            $user->save();
    
            event(new PasswordReset($user));
            
            // Update verified user and delete token
            if(!$user->email_verified_at) {
                $verifyUser->user->email_verified_at = now();
                $verifyUser->user->save();
                $verifyUser->delete();
            }
            //Log user with new credentials
            Auth::guard()->login($user);

            return redirect('/orders');
            
        }

    }
}
