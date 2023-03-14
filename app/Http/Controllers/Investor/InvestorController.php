<?php

namespace App\Http\Controllers\Investor;

use App\Models\ProfileType;
use Illuminate\Http\Request;
use App\Models\ProfileSubType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvestorController extends Controller
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
        $profileSubId = $user->profile_sub_id;
        $tmpProfile = (
            is_null($profileSubId)
                ? null
                : ProfileSubType::whereProfileId($profileId)
                    ->whereProfileSubId($profileSubId)
                    ->whereStatus(1)
                    ->first()
            );

        if(!is_null($tmpProfile))
        {
            $prefix = $tmpProfile->dashboard.'.';
        }

        return view('investor.'.$prefix.'index');
    }
}
