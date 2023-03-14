<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function AdminDashboard()
    {
        return 'Admin Dashboard';
        // view('admin.index');
    }

    public function IndexDashboard()
    {
        return 'User Dashboard';
        // view('user.index');
    }
}