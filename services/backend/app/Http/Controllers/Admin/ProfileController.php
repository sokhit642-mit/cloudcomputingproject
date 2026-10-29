<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Admin::where('role','1')->get();
        return view('admin.profile.index', compact('profile'));
    }
}
