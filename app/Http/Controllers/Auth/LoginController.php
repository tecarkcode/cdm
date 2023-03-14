<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\ProfileType;
use Illuminate\Http\Request;
use App\Models\ProfileSubType;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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

        $user = User::whereId(Auth::id())->first();
        // Get the Appropriate Profile
        $profile = $this->getAppropriateProfile($user);
        if(!$profile)
        {
            dd('Não foi possível localizar o profile.');
        }

        return redirect()->route($profile);
    }

    function getAppropriateProfile($user)
    {
        $profile = "user.dashboard";
        // !is_a($user, Collection::class) // check if is a Collection
        if(is_null($user))
        {
            return false;
        }
        
        $profileId = $user->profile_id;
        // If don't found the profile Id
        if(!$profileId || is_null($profileId))
        {
            Auth::logout();
            dd("Houve um erro ao identificar o tipo de perfil, por favor, tente novamente mais tarde.");
        }

        $profileSubId = $user->profile_subid;
        // Get the Appropriate Dashboard
        $tmpProfile = (
            is_null($profileSubId)
                ? ProfileType::whereId($profileId)
                : $tmpProfile = ProfileSubType::whereId($profileSubId)
                    ->whereProfileId($profileId)
            )->whereStatus(1)->first();

        // Verify if Dashboard is Ok
        if(is_null($tmpProfile) || is_null($tmpProfile = $tmpProfile->dashboard))
        {
            Auth::logout();
            dd("A dashboard apropriada não foi encontrada.");
        }

        $profile = $tmpProfile.".dashboard";
        return $profile;
    }
}
