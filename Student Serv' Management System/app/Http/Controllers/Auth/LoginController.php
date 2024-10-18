<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function authenticated(Request $request, $user)
    {

        if ($user->hasRole('admin')) {
            return  redirect()->route('admin');
        }
        if ($user->hasRole('schooladmin')) {
            return  redirect()->route('schooladmin');
        }
        if ($user->hasRole('businessowner')) {
            return  redirect()->route('businessowner');
        }
        if ($user->hasRole('student')) {
            return  redirect()->route('student');
        }

    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
