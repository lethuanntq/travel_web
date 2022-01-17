<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = RouteServiceProvider::HOME;
        protected function redirectTo()
        {
            if ( Auth::user()->role == User::ROLE_ADMIN) {
                return route('management.home');
            }else {
                return route('home');
            }

        }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        if (auth()->attempt(['email' => $input['email'], 'password' => $input['password'], 'active' => 1])) {
                return redirect()->route('management.home');
        } else {
            return redirect()->route('login')->with('error', 'Thông tin đăng nhập chưa đúng hoặc tài khoản của bạn chưa được active');
        }
    }

    public function logout(){
        \Auth::logout();
        return redirect()->route('management.home');
    }


}
