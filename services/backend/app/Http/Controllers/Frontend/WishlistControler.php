<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistControler extends Controller
{
    public function index()
    {
        return view('frontend.wishlists.index');
    }
}
