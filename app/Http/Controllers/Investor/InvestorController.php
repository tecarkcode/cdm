<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvestorController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        if(!$user)
        {
            dd("Não foi possível identificar o usuário.");
        }

        
        
        return view('investor.index');
    }
}
