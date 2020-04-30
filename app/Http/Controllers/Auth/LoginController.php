<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
        // print_r("expression");exit();

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'inicio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
                // print_r("expression");exit();

        $this->middleware('guest')->except('logout');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        if(!Auth::check()) {
            return redirect('/');
        }
        $m = User::find(Auth::user()->id);
        $m->activo =0;
        $m->save();
        if (isset($_SESSION)){
            session_destroy();
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect('/');
    }


    public function username()
        {
            return 'correo';
        }   


}
