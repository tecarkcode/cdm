<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProfileType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DefaultController extends Controller
{
    public function profiles()
    {
        $profiles = ProfileType::withTrashed()->get();
        return view('admin.profiles.profiles', compact('profiles'));
    }

    public function subprofiles()
    {
        return view('admin.profiles.subprofiles');
    }
}
