<?php

namespace App\Http\Livewire\Fronted\Checkout;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Token;
use App\Models\Chatid;
use App\Models\Coupon;
use GuzzleHttp\Client;
use Livewire\Component;
use App\Models\CartTotal;
use App\Models\Orderitem;
use Illuminate\Support\Str;
use App\Models\Merchantbakongkhqr;

class CheckoutShow extends Component
{
    public $carts = []; // To store cart items
    public $fullname = "";
    public $email, $phone, $address;
    public $payment_mode = NULL, $payment_id = NULL;
    public $showQrCode = false;

    // public $totalProductAmount;
    // public $discount;
    public $totalAfterDiscount;
    public $couponCode = ''; // To store the coupon code input
    public $discount = 0; // Discount amount
    public $totalProductAmount = 0; // Initialize this to your cart total amount
    public $couponApplied = false; // Track if coupon has been applied
 

    // public function updatedFullname($value)
    // {
    //     logger('Fullname updated:', ['value' => $value]);
    // }
    public function mount()
    {
        // $this->fullname = '';
        // Initialize properties
        $this->carts = session()->get('carts', []); // Retrieve cart from session
        // $this->totalProductAmount = $this->calculateTotalAmount(); // Calculate total from cart items
        $this->resetCoupon(); // Reset coupon when mounting the component
        $this->loadCartTotal();
    }
    public function calculateTotalAfterDiscount($discount)
    {
        return max(0, $this->totalProductAmount - $discount); // Avoid negative totals
    }
    
    // Assuming this is called in a method when applying the coupon
    // public function applyCoupon()
    // {
    //     // Check if a coupon code has been entered
    //     if ($this->couponCode) {
    //         $coupon = Coupon::where('code', $this->couponCode)->first();
            
    //         if ($coupon && $coupon->isUsable()) {
    //             // Calculate discount based on coupon type
    //             if ($coupon->discount_type === 'percent') {
    //                 // Calculate percentage discount on total product amount
    //                 $this->discount = ($this->totalProductAmount * ($coupon->discount_value / 100));
    //             } else {
    //                 // Apply fixed discount
    //                 $this->discount = $coupon->discount_value;
    //             }
                
    //             // Ensure that discount does not exceed total product amount
    //             $this->discount = min($this->discount, $this->totalProductAmount);
    
    //             // Update total product amount after discount is applied
    //             $this->totalProductAmountAfterDiscount = max(0, $this->totalProductAmount - $this->discount);
    
    //             // Mark the coupon as applied
    //             $this->couponApplied = true; 
    
    //             // Emit success message
    //             $this->emit('alertMessage', 'success', __('Coupon applied successfully!'));
    //         } else {
    //             // Invalid or unusable coupon
    //             $this->emit('alertMessage', 'error', __('Invalid or expired coupon.'));
    //         }
    //     }
    // }
    
    public function applyCoupon()
    {
        if ($this->couponCode) {
            $coupon = Coupon::where('code', $this->couponCode)->first();
    
            if ($coupon && $coupon->isUsable()) {
                $totalPrice = 0;
                $totalDiscount = 0;
    
                foreach ($this->carts as $cartItem) {
                    if ($cartItem->product) {
                        $productTotal = $cartItem->product->discounted_price * $cartItem->quantity;
    
                        if ($coupon->discount_type === 'percent') {
                            $itemDiscount = $productTotal * ($coupon->discount_value / 100);
                        } else {
                            $itemDiscount = $coupon->discount_value / count($this->carts);
                        }
    
                        $totalAfterDiscount = $productTotal - $itemDiscount;
    
                        $cartItem->total_price = $productTotal;
                        $cartItem->total_after_discount = max(0, $totalAfterDiscount);
                        $cartItem->save();
    
                        $totalPrice += $cartItem->total_after_discount;
                        $totalDiscount += $itemDiscount;
                    }
                }
                $this->totalProductAmount = $totalPrice;
                $this->discount = $totalDiscount;
                $this->totalAfterDiscount = $this->totalProductAmount - $this->discount;
    
                $this->couponApplied = true;
                $this->emit('alertMessage', 'success', __('Coupon applied successfully!'));

                
            } else {
                $this->emit('alertMessage', 'error', __('Invalid or expired coupon.'));
            }
        }
    }

    public function resetCoupon()
    {
        // Automatically reset coupon data when the page is reloaded
        $this->couponCode = '';
        $this->discount = 0;
        $this->couponApplied = false; // Allow reapplication of coupon
    }
    // public function sendTelegramMessage($message)
    // {
    //     $client = new Client();
    //     $botToken = '8065406790:AAH3pgMiJDjSllHctHhqSZhy6PBem6cgFvA'; // Your Telegram bot token
    //     $chatId = '1223986190'; // Your chat ID

    //     $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

    //     $client->post($url, [
    //         'form_params' => [
    //             'chat_id' => $chatId,
    //             'text' => $message,
    //         ],
    //     ]);
    // }
    public function sendTelegramMessage($message)
    {
        // Retrieve the chat ID from the database
        $chatId = Chatid::first()->chat_id; // Assuming you're sending the message to the first admin

        // Your Telegram bot token
        $botToken = '8065406790:AAH3pgMiJDjSllHctHhqSZhy6PBem6cgFvA';

        $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

        // Sending the message
        $client = new Client();
        $client->post($url, [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => $message,
            ],
        ]);
    }
    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += ($cartItem->product->discounted_price * $cartItem->quantity);
        }
        return $this->totalProductAmount;
    }
    
    protected $listeners = [
        'validationForAll',
        'transactionsEmit'
    ];
    public function transactionsEmit()
    {
        $this->payment_id = 'QR_'.Str::random(10);
        $this->payment_mode = 'Paid by KHQR';

        $codOrder = $this->placeOrder();
        if($codOrder)
        {
            Cart::where('user_id', auth()->user()->id)->delete();
            CartTotal::where('user_id', auth()->user()->id)->delete();
            $this->emit('alertMessage', 'success',__('front_alert.Order placed successfully'));

            $this->emit('orderCreated', $codOrder->toArray());

            return redirect()->to('thank-you'); 
        }else{
            $this->emit('alertMessage', 'error',__('front_alert.Something went wrong'));
        }


    }
    public function validationForAll()
    {
        
        $this->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
        ]);
        // Emit an event to trigger the modal
        // $this->showQrCode = true;
    }
    public function rules()
    {
        return [
            'fullname' =>'required|string|max:121',
            'email' =>'required|email|max:121',
            'phone' =>'required|string|max:11|min:10',
            'address' =>'required|string|max:500',
        ];
    }
    // public function updated($fields)
    // {
    //     $this->validateOnly($fields, [
    //         'fullname' => 'required|string',
    //         'email' =>'required|email|max:121',
    //         'phone' =>'required|string|max:11|min:10',
    //         'address' =>'required|string|max:500',
    //     ]);
    // }
    // public function placeOrder()
    // {
    //     $this->validate();
    
    //     $order = Order::create([
    //         'user_id' => auth()->user()->id,
    //         'tracking_no' => 'home-sport-' . Str::random(10),
    //         'fullname' => $this->fullname,
    //         'phone' => $this->phone,
    //         'email' => $this->email,
    //         'address' => $this->address,
    //         'status_message' => 'in-progress',
    //         'payment_mode' => $this->payment_mode,
    //         'payment_id' => $this->payment_id,
    //     ]);
    
    //     $totalPrice = 0; // To calculate the total price
    //     $orderDetails = ""; // To hold the order details
    //     $orderDate = now()->format('Y-m-d H:i:s'); // Format the order date
    
    //     foreach ($this->carts as $cartItem) {
    //         $product = $cartItem->product; // Assuming your Cart model has a 'product' relationship
    //         $productSize = $cartItem->product_size_id ? $cartItem->productSize : null; // Adjust based on your relationship
    //         $productColor = $cartItem->product_color_id ? $cartItem->productColor : null; // Adjust based on your relationship
    
    //         // Calculate price for this item
    //         $price = $product->discounted_price * $cartItem->quantity;
           
    //         // Add product details to the message
    //         $orderDetails .= "Customer: {$order->fullname}\n";
    //         $orderDetails .= "Phone: {$order->phone}\n";
    //         $orderDetails .= "Email: {$order->email}\n";
    //         $orderDetails .= "Product: {$product->name}\n"; 
    //         $orderDetails .= "Size: " . ($productSize ? $productSize->size->name : "N/A") . "\n";
    //         $orderDetails .= "Color: " . ($productColor ? $productColor->color->name : "N/A") . "\n";
    //         $orderDetails .= "Quantity: {$cartItem->quantity}\n";
    //         $orderDetails .= "Total Price: $ {$price}.00\n\n";
            
    //         // Update the total price
    //         $totalPrice += $price;
    
    //         // Create the order item
    //         Orderitem::create([
    //             'order_id' => $order->id,
    //             'product_id' => $cartItem->product_id,
    //             'product_color_id' => $cartItem->product_color_id,
    //             'product_size_id' => $cartItem->product_size_id,
    //             'quantity' => $cartItem->quantity,
    //             'price' => $price,
    //         ]);
    
    //         // Decrement the product quantity based on color or size
    //         if ($cartItem->product_color_id !== NULL) {
    //             $productColor = $cartItem->productColor()->find($cartItem->product_color_id);
    //             if ($productColor) {
    //                 $productColor->decrement('quantity', $cartItem->quantity);
    //             }
    //         } elseif ($cartItem->product_size_id !== NULL) {
    //             $productSize = $cartItem->productSize()->find($cartItem->product_size_id);
    //             if ($productSize) {
    //                 $productSize->decrement('quantity', $cartItem->quantity);
    //             }
    //         } else {
    //             $product->decrement('quantity', $cartItem->quantity);
    //         }
    //     }
    
    //     // Send the order details to Telegram, including the order date
    //     $this->sendTelegramMessage("New Order :\nOrder ID: " . $order->id . "\nDate: " . $orderDate . "\n" . $orderDetails);
        
    //     // Clear the cart after the order is placed
    //     Cart::where('user_id', auth()->user()->id)->delete();
    //     session()->forget('carts'); // Clear the cart session
    //     $this->resetCoupon();
    //     return $order;
    // }
    public function placeOrder()
    {
        $this->validate();

        // Create the order
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'home-sport-' . Str::random(10),
            'fullname' => $this->fullname,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'status_message' => 'in-progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);

        // Initialize variables for total price and order details
        $totalPrice = 0;
        $orderDetails = "";
        $orderDate = now()->format('Y-m-d H:i:s');

        // Get user's cart total (including discounts if any)
        $cartTotal = CartTotal::where('user_id', auth()->user()->id)->first();
        $discountedTotal = $cartTotal ? $cartTotal->total_amount : null;
        $couponDetails = CartTotal::where('user_id', auth()->user()->id)->with('coupon')->first(); // Assuming a 'coupon' relationship in CartTotal
        $couponCode = $couponDetails && $couponDetails->coupon ? $couponDetails->coupon->code : 'N/A';
        $discountType = $couponDetails && $couponDetails->coupon ? $couponDetails->coupon->discount_type : 'N/A';
        $discountValue = $couponDetails && $couponDetails->coupon ? $couponDetails->coupon->discount_value : 0;

        foreach ($this->carts as $cartItem) {
            $product = $cartItem->product;
            $productSize = $cartItem->product_size_id ? $cartItem->productSize : null;
            $productColor = $cartItem->product_color_id ? $cartItem->productColor : null;
        
            // Calculate price per item
            $itemPrice = $discountedTotal
                ? ($cartItem->quantity * ($discountedTotal / $this->carts->sum('quantity')))
                : $product->discounted_price * $cartItem->quantity;
        
            // Update order details
            
            
            // $orderDetails .= "Customer: {$order->fullname}\n";
            // $orderDetails .= "Phone: {$order->phone}\n";
            // $orderDetails .= "Email: {$order->email}\n";
            // $orderDetails .= "Product: {$product->name}\n";
            // $orderDetails .= "Size: " . ($productSize ? $productSize->size->name : "N/A") . "\n";
            // $orderDetails .= "Color: " . ($productColor ? $productColor->color->name : "N/A") . "\n";
            // $orderDetails .= "Payment Method:" .($this->payment_mode). "\n";
            // $orderDetails .= "Quantity: {$cartItem->quantity}\n";
            // $orderDetails .= "Coupon: {$couponCode}\n";
            // $orderDetails .= "Discount Value: -{$discountValue} " .($cartTotal->coupon->discount_type === 'percent' ? '%' : '$') . "\n";
            // $orderDetails .= "Total Price: $ {$itemPrice}.00\n\n";
            $orderDetails .= "Customer: {$order->fullname}\n";
            $orderDetails .= "Phone: {$order->phone}\n";
            $orderDetails .= "Email: {$order->email}\n";
            $orderDetails .= "Product: {$product->name}\n";
            $orderDetails .= "Size: " . ($productSize ? $productSize->size->name : "N/A") . "\n";
            $orderDetails .= "Color: " . ($productColor ? $productColor->color->name : "N/A") . "\n";
            $orderDetails .= "Payment Method: " . ($this->payment_mode ?? "N/A") . "\n";
            $orderDetails .= "Quantity: {$cartItem->quantity}\n";
            $orderDetails .= "Coupon: " . ($couponCode ?? "None") . "\n";
            
            if ($cartTotal && $cartTotal->coupon) {
                $discountValue = $cartTotal->coupon->discount_value ?? 0;
                $discountType = $cartTotal->coupon->discount_type === 'percent' ? '%' : '$';
                $orderDetails .= "Discount Value: -{$discountValue} {$discountType}\n";
            } else {
                $orderDetails .= "Discount Value: N/A\n";
            }
            
            $orderDetails .= "Total Price: $ {$itemPrice}.00\n\n";
            
            // Create order item
            Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'product_size_id' => $cartItem->product_size_id,
                'quantity' => $cartItem->quantity,
                'price' => $itemPrice,
                'coupon_code' => $couponCode ? : 'NULL',
                'discount_value' => $discountValue ? : 0,
                // 'total_discount' => $cartTotal->total_discount,
                'total_discount' => $cartTotal ? $cartTotal->total_discount : 0,
                'discount_type' =>  $cartTotal ? $cartTotal->coupon->discount_type : 'NULL',
                
            ]);
            // Decrement the product quantity based on color or size
            if ($cartItem->product_color_id !== NULL) {
                $productColor = $cartItem->productColor()->find($cartItem->product_color_id);
                if ($productColor) {
                    $productColor->decrement('quantity', $cartItem->quantity);
                }
            } elseif ($cartItem->product_size_id !== NULL) {
                $productSize = $cartItem->productSize()->find($cartItem->product_size_id);
                if ($productSize) {
                    $productSize->decrement('quantity', $cartItem->quantity);
                }
            } else {
                $product->decrement('quantity', $cartItem->quantity);
            }
        }
        

        // Send order details via Telegram
        $this->sendTelegramMessage("New Order:\nOrder ID: {$order->id}\nDate: {$orderDate}\n" . $orderDetails);

        // Clear user's cart
        Cart::where('user_id', auth()->user()->id)->delete();
        session()->forget('carts');
        $this->resetCoupon();

        return $order;
    }

    public function codOrder()
    {
        
        $this->payment_mode = 'Payment upon goods arrival';
        
        $codOrder = $this->placeOrder();
        if($codOrder)
        {
            
            Cart::where('user_id', auth()->user()->id)->delete();
            CartTotal::where('user_id', auth()->user()->id)->delete();
            $this->emit('alertMessage', 'success',__('front_alert.Order placed successfully'));
          
           $this->emit('orderCreated', $codOrder->toArray());

            return redirect()->to('thank-you'); 
        }else{
            $this->emit('alertMessage', 'error',__('front_alert.Something went wrong'));
        }
    }
    private function loadCartTotal()
    {
        // Fetch the total from the cart_totals table
        $this->carttotal = CartTotal::where('user_id', auth()->user()->id)->first();
    }
    public function render()
    {
   
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->phone;
        $this->address = auth()->user()->address;
        $carttotal = CartTotal::where('user_id', auth()->user()->id)->first();
        $this->totalProductAmount = $this->totalProductAmount();
        // $user = auth()->user();
        $user = User::where('id', auth()->user()->id)->first();

        $bakong = Merchantbakongkhqr::first();
        $renew = Token::first();
        
        return view('livewire.fronted.checkout.checkout-show',[
            'user' => $user,
            'totalProductAmount' => $this->totalProductAmount,
            'carttotal' => $this->carttotal,
            'bakong' => $bakong,
            'token' => $renew,
         
             // Assuming you have a Merchantbakongkhqr model for your bakongkhqr information
             // Pass the cart total to the view
        ]);
    }
}
