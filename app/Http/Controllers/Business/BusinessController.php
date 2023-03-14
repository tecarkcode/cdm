<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Models\ProfileSubType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function dashboard()
    {
        $prefix = null;
        $user = Auth::user();
        if(!$user)
        {
            dd("Não foi possível identificar o usuário.");
        }
        
        $profileId = $user->profile_id;
        $profileSubId = $user->profile_subid;
        $tmpProfile = (
            is_null($profileSubId)
                ? null
                : $tmpProfile = ProfileSubType::whereProfileId($profileId)
                    ->whereProfileSubid($profileSubId)
            )->whereStatus(1)->first();
        
        if(!is_null($tmpProfile))
        {
            $prefix = $tmpProfile->dashboard.'.';
        }

        return view('business.'.$prefix.'index');
    }
}
