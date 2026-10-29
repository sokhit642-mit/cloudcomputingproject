<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role_as','0')->get();
        return view('admin.user.user', compact('user'));
    }
    public function view(User $user)
    {
        // $admin = Admin::where('role','1')->get();
        return view('admin.user.user-view', compact('user'));
    }
}
