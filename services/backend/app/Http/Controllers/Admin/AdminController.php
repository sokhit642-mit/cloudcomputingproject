<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::where('role','1')->get();
        return view('admin.user.admin', compact('admin'));
    }
    public function view(Admin $admin)
    {
        // $admin = Admin::where('role','1')->get();
        return view('admin.user.admin-view', compact('admin'));
    }
    
}
