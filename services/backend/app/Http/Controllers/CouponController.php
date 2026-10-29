<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupons.index', compact('coupons'));
    }
    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code',
            'discount_type' => 'required|in:fixed,percent',
            'discount_value' => 'required|numeric|min:1',
            'expiry_date' => 'required|date|after:today',
            'usage_limit' => 'required|integer|min:1',
        ]);

        Coupon::create($request->all());

        return redirect('admin/coupons')->with('message', 'Coupon created successfully!','success');
    }

    public function applyCoupon(Request $request)
    {
        $request->validate(['couponCode' => 'required|string']);

        $coupon = Coupon::where('code', $request->couponCode)->first();

        if ($coupon && $coupon->isUsable()) {
            // Calculate discount based on coupon type
            $discount = $coupon->discount_type === 'percent' 
                ? ($request->totalProductAmount * ($coupon->discount_value / 100))
                : $coupon->discount_value; // Fixed discount

            // Increase the usage count
            $coupon->increment('usage_count');

            return response()->json([
                'success' => true,
                'message' => 'Coupon applied successfully!',
                'discount' => $discount,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Coupon is not valid, expired, or usage limit reached.',
        ]);
    }

    public function resetCoupon()
    {
        // Logic to reset coupon (if needed)
        return response()->json([
            'success' => true,
            'message' => 'Coupon has been reset.'
        ]);
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupons.edit', compact('coupon'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => "required|unique:coupons,code,{$id}",
            'discount_type' => 'required|in:fixed,percent',
            'discount_value' => 'required|numeric|min:1',
            'expiry_date' => 'required|date|after:today',
            'usage_limit' => 'required|integer|min:1',
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->update($request->all());

        return redirect('admin/coupons')->with('message', 'Coupon updated successfully!','success');
    }
}
