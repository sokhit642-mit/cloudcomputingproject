<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class QrscanController extends Controller
{
    public function index()
    {
        $cart = Cart::all();
        return view('frontend.qrscan.index', compact('cart'));
    }
}
