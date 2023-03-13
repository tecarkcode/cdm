<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $field = filter_var($request->post('email_cnpj'), FILTER_VALIDATE_EMAIL) ? 'email' : 'cnpj';
        $request->merge([$field => $request->post('email_cnpj')]);
    
        $credentials = $request->only($field, 'password');
    
        if (!Auth::attempt($credentials)) {
            return redirect()->route('login')
                ->withInput()
                ->withErrors(['message' => 'Dados incorretos, tente novamente.']);
        }
    
        return redirect()->route('user.dashboard');
    }
}
