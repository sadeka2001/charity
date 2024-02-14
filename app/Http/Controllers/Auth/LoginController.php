<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // protected function authenticated(Request $request)
    // {

    //     $input = $request->all();

    //         $this->validate($request, [

    //         'email' => 'required|email',
    //         'password' => 'required',

    //     ]);



    //     if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))

    //     {

    //         if(Auth::user()->role_as == '1')
    //     {
    //         return redirect()->route('dashboard');
    //     }

    //     elseif(Auth::user()->role_as == '0') // Normal or Default User Login
    //     {
    //         return '/';
    //     }

    //     }
    //     // else{

    //     //     return redirect()->route('login')

    //     //         ->with('error','Email-Address And Password Are Wrong.');

    //     // }



    // }

    protected function authenticated()
    {
        if(Auth::user()->role_as == '1') //1 = Admin Login
        {
            return redirect('/dashboard')->with('status','Welcome to your dashboard');
        }
        elseif(Auth::user()->role_as == '0') // Normal or Default User Login
        {
            return redirect('/')->with('status','Logged in successfully');
        }
    }

}
