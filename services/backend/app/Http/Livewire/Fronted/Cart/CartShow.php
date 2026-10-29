<?php

namespace App\Http\Livewire\Fronted\Cart;

use App\Models\Cart;
use App\Models\Coupon;
use Livewire\Component;
use App\Models\CartTotal;

class CartShow extends Component
{
    public $cart = [];
    public $totalProductAmount = 0;
    public $totalAfterDiscount = 0;
    public $couponCode = '';
    public $discount = 0;
    public $couponApplied = false;
    public $coupon_id;

    public function mount()
    {
        $this->loadCart();
        // $this->updateTotalPrice();
        $this->resetCoupon();
    }

    private function loadCart()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
       
        if ($cartData) {
            [$availableSizeQuantity, $availableColorQuantity] = $this->getAvailableQuantities($cartData);

            if ($cartData->quantity < $availableSizeQuantity && $cartData->quantity < $availableColorQuantity) {
                $cartData->increment('quantity');
                $this->emit('message', __('front_alert.Quantity updated'), 'success');

                // Recalculate total after quantity update
                // $this->updateTotalPrice();
                $this->resetCoupon();
                // Reapply the coupon if it's applied
                if ($this->couponApplied) {
                    $this->applyCoupon();
                }
            } else {
                $this->emit('message', __('front_alert.Product in stock is only') . ' ' . min($availableSizeQuantity, $availableColorQuantity), 'warning');
            }
        } else {
            $this->emit('message', __('front_alert.Something went wrong.'), 'error');
        }
    }

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {
            if ($cartData->quantity > 1) {
                $cartData->decrement('quantity');
                $this->emit('message', __('front_alert.Quantity updated'), 'success');

                // Recalculate total after quantity update
                // $this->updateTotalPrice();
                $this->resetCoupon();
                // Reapply the coupon if it's applied
                if ($this->couponApplied) {
                    $this->applyCoupon();
                }
            } else {
                $this->emit('message', __('front_alert.Quantity cannot be less than 1'), 'warning');
            }
        } else {
            $this->emit('message', __('front_alert.Something went wrong.'), 'error');
        }
    }

    public function removeCartItem(int $cartId)
    {
        Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->delete();
        $this->emit('cartUpdated');
        $this->emit('message', __('front_alert.Cart item removed'), 'success');
        // $this->updateTotalPrice();
    }

    private function getAvailableQuantities($cartData)
    {
        $availableSizeQuantity = PHP_INT_MAX;
        $availableColorQuantity = PHP_INT_MAX;

        if ($cartData->product_size_id) {
            $productSize = $cartData->product->productSizes()->where('id', $cartData->product_size_id)->first();
            if ($productSize) {
                $availableSizeQuantity = $productSize->quantity;
            }
        }

        if ($cartData->product_color_id) {
            $productColor = $cartData->product->productColors()->where('id', $cartData->product_color_id)->first();
            if ($productColor) {
                $availableColorQuantity = $productColor->quantity;
            }
        }

        if (!$cartData->product_size_id && !$cartData->product_color_id) {
            $availableSizeQuantity = $cartData->product->quantity;
            $availableColorQuantity = $cartData->product->quantity;
        }

        return [$availableSizeQuantity, $availableColorQuantity];
    }

    // public function updateTotalPrice()
    // {
    //     $this->totalProductAmount = 0;
    //     foreach ($this->cart as $cartItem) {
    //         $this->totalProductAmount += $cartItem->product->discounted_price * $cartItem->quantity;
    //     }

    //     // If coupon is applied, calculate the total after discount
    //     if ($this->couponApplied) {
    //         $this->totalAfterDiscount = $this->totalProductAmount - $this->discount;
    //     } else {
    //         $this->totalAfterDiscount = $this->totalProductAmount;
    //     }
    // }
    // private function updateCartTotal($totalPrice, $totalDiscount)
    // {
    //     $cartTotal = \App\Models\CartTotal::where('user_id', auth()->user()->id)->first();
    
    //     if ($cartTotal) {
    //         $cartTotal->total_amount = $totalPrice; // Update total amount after coupon
    //         $cartTotal->total_discount = $totalDiscount; // Update total discount applied
    //         $cartTotal->save();
    //     } else {
    //         \App\Models\CartTotal::create([
    //             'user_id' => auth()->user()->id,
    //             'total_amount' => $totalPrice,
    //             'total_discount' => $totalDiscount,
    //             'coupon_id' => $coupon ? $coupon->id : null, // Set coupon_id if coupon exists, otherwise null
    //         ]);
            
    //     }
    // }
    
    private function updateCartTotal($totalPrice, $totalDiscount, $coupon = null)
    {
        $cartTotal = \App\Models\CartTotal::where('user_id', auth()->user()->id)->first();
        $coupon = Coupon::where('code', $this->couponCode)->first();
        if ($this->couponCode) {
            if ($cartTotal) {
                $cartTotal->total_amount = $totalPrice;
                $cartTotal->total_discount = $totalDiscount;
                $cartTotal->coupon_id = $coupon ? $coupon->id : null; // Use the passed coupon object
                $cartTotal->save();
            } else {
                \App\Models\CartTotal::create([
                    'user_id' => auth()->user()->id,
                    'total_amount' => $totalPrice,
                    'total_discount' => $totalDiscount,
                    'coupon_id' =>  $coupon->id, // Use the passed coupon object
                ]);
            }
        }
        
    }


    
    public function applyCoupon()
    {
        if ($this->couponCode) {
            $coupon = Coupon::where('code', $this->couponCode)->first();

            if ($coupon && $coupon->isUsable()) {
                $totalPrice = 0; // Total amount after applying coupon
                $totalDiscount = 0; // Total discount applied

                foreach ($this->cart as $cartItem) {
                    if ($cartItem->product) {
                        $productTotal = $cartItem->product->discounted_price * $cartItem->quantity;

                        // Calculate discount based on coupon type
                        if ($coupon->discount_type === 'percent') {
                            $itemDiscount = $productTotal * ($coupon->discount_value / 100);
                        } else {
                            $itemDiscount = $coupon->discount_value / count($this->cart);
                        }

                        // Ensure the discounted price doesn't go negative
                        $totalAfterDiscount = max(0, $productTotal - $itemDiscount);

                        // // Update cart item with total prices
                        // $cartItem->total_price = $productTotal; // Regular total price
                        // $cartItem->total_after_discount = $totalAfterDiscount; // Total after discount
                        // $cartItem->save(); // Save the cart item changes

                        // Sum up the total after discount for the entire cart
                        $totalPrice += $totalAfterDiscount;
                        $totalDiscount += $itemDiscount; // Sum up total discount
                    }
                }

                // Update the total amount in the database
                $this->updateCartTotal($totalPrice, $totalDiscount); // Update total amount after coupon applied

                $this->discount = $totalDiscount; // Store the total discount
                $this->totalAfterDiscount = $totalPrice; // Store the total after discount
                $this->couponApplied = true; // Set coupon applied status
                $coupon->incrementUsageCount();
                
                // $this->emit('alertMessage', 'success', __('Coupon applied successfully!'));
                $this->emit('message', __('Coupon applied successfully!'), 'success');

            } else {
                $this->emit('message', __('Invalid or expired coupon.'), 'error');

                // $this->emit('alertMessage', 'error', __('Invalid or expired coupon.'));
            }
        }
    }

    public function resetCoupon()
    {
        $this->couponCode = '';
        $this->discount = 0;
        $this->couponApplied = false;
        $this->totalAfterDiscount = $this->totalProductAmount;
        CartTotal::where('user_id', auth()->user()->id)->delete();
    }

    public function render()
    {
        $this->loadCart();
        return view('livewire.fronted.cart.cart-show', [
            'cart' => $this->cart,
            'totalProductAmount' => $this->totalProductAmount,
            'totalAfterDiscount' => $this->totalAfterDiscount
        ]);
    }
}
