<?php

namespace App\Http\Livewire\Fronted\Products;

use App\Models\Cart;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category;
    public $product;
    public $productId;
    public $productColorId;
    public $productSizeId;
    public $quantityCount = 1;
    public $productSizeSelectedQuantity;
    public $productColorSelectedQuantity;
    public $productcolorId;

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
   
    }

    public function render()
    {
        return view('livewire.fronted.products.view', [
            'category' => $this->category,
            'product' => $this->product,
            
        ]);
    }

    public function addToWishlist($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                // $this->emit('message', 'warning',__('front_alert.Already added to wishlist'));
                $this->emit('message', __('front_alert.Already added to wishlist'), 'info');

                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                $this->emit('wishlistUpdated');
                // $this->emit('message', 'success',__('front_alert.Product added to wishlist successfully'));
                $this->emit('message', __('front_alert.Product added to wishlist successfully'), 'success');

            }
        } else {
            // $this->emit('message', 'error',__('front_alert.Please login to add product to wishlist'));
            $this->emit('message', __('front_alert.Please login to add product to wishlist'), 'error');

            return false;
        }
    }
    public function incrementQuantity(){
        if($this->quantityCount < 10 ){
            $this ->quantityCount++;

        }
    }
    public function decrementQuantity(){
        if($this->quantityCount > 1 ){
            $this ->quantityCount--;
        }

    }
    
    public function sizeSelected($productsizeId)
    {
        // dd($productsizeId);
        $productSize = $this->product->productSizes()->where('id', $productsizeId)->first();
        $this->productSizeSelectedQuantity = $productSize -> quantity;
        if($this->productSizeSelectedQuantity == 0 ) {
            $this->productSizeSelectedQuantity = 'out of stock';

        }
    }
    public function colorSelected($productcolorId)
    {
        // dd($productsizeId);
        $this->productColorId = $productcolorId;
        $productColor = $this->product->productColors()->where('id', $productcolorId)->first();
        $this->productColorSelectedQuantity = $productColor -> quantity;
        if($this->productColorSelectedQuantity == 0 ) {
            $this->productColorSelectedQuantity = 'out of stock';

        }
    }
    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            $product = $this->product->where('id', $productId)->where('status', '0')->first();

            if ($product) {
                // Check if the product has colors and sizes
                $hasColors = $product->productColors()->count() > 0;
                $hasSizes = $product->productSizes()->count() > 0;

                // Initialize variables for productColor and productSize
                $productColor = null;
                $productSize = null;

                // Product has both colors and sizes
                if ($hasColors && $hasSizes) {
                    if (!$this->productColorId || !$this->productSizeId) {
                        $this->emit('message',__('front_alert.Please select product color and size'),'info');
                        return;
                    }
                    $productColor = $product->productColors()->where('id', $this->productColorId)->first();
                    $productSize = $product->productSizes()->where('id', $this->productSizeId)->first();

                    if (!$productColor || $productColor->quantity < $this->quantityCount) {
                        $this->emit('message',__(__('front_alert.Product color in stock') . ' ' .$productColor->quantity),'info');
                        return;
                    }

                    if (!$productSize || $productSize->quantity < $this->quantityCount) {
                        $this->emit('message', __(__('front_alert.Product size in stock') . ' ' . $productSize->quantity),'info');
                        return;
                    }

                    // Check if the product with the same color and size already exists in the cart
                    $existingCartItem = Cart::where('user_id', auth()->user()->id)
                        ->where('product_id', $productId)
                        ->where('product_color_id', $this->productColorId)
                        ->where('product_size_id', $this->productSizeId)
                        ->first();
                }
                // Product has only colors
                elseif ($hasColors) {
                    if (!$this->productColorId) {
                        $this->emit('message',__('front_alert.Please select product color'),'info');
                        return;
                    }
                    $productColor = $product->productColors()->where('id', $this->productColorId)->first();

                    if (!$productColor || $productColor->quantity < $this->quantityCount) {
                        $this->emit('message',__('front_alert.Product color in stock ' . $productColor->quantity),'info');
                        return;
                    }

                    // Check if the product with the same color already exists in the cart
                    $existingCartItem = Cart::where('user_id', auth()->user()->id)
                        ->where('product_id', $productId)
                        ->where('product_color_id', $this->productColorId)
                        ->first();
                }
                // Product has only sizes
                elseif ($hasSizes) {
                    if (!$this->productSizeId) {
                        $this->emit('message',__('front_alert.Please select product size'),'info');
                        return;
                    }
                    $productSize = $product->productSizes()->where('id', $this->productSizeId)->first();

                    if (!$productSize || $productSize->quantity < $this->quantityCount) {
                        $this->emit('message',__(__('front_alert.Product size in stock') .' '. $productSize->quantity),'info');
                        return;
                    }

                    // Check if the product with the same size already exists in the cart
                    $existingCartItem = Cart::where('user_id', auth()->user()->id)
                        ->where('product_id', $productId)
                        ->where('product_size_id', $this->productSizeId)
                        ->first();
                }
                // Product has neither colors nor sizes
                else {
                    if ($product->quantity < $this->quantityCount) {
                        $this->emit('message',__(__('front_alert.Product in stock') .' '. $product->quantity),'info');
                        return;
                    }

                    // Check if the product already exists in the cart
                    $existingCartItem = Cart::where('user_id', auth()->user()->id)
                        ->where('product_id', $productId)
                        ->first();
                }

                // If product already exists in the cart, emit a info
                if (isset($existingCartItem) && $existingCartItem) {
                    $this->emit('message', __('front_alert.Product already in cart'),'info');
                    return;
                }

                // Insert product to cart
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                    'product_color_id' => $this->productColorId,
                    'product_size_id' => $this->productSizeId,
                    'quantity' => $this->quantityCount
                ]);
                $this->emit('cartUpdated');
                $this->emit('message',__('front_alert.Product added to cart successfully'),'success');
            } else {
                $this->emit('message',__('front_alert.Product does not exist'),'info');
            }
        } else {
            $this->emit('message',__('front_alert.Please login to add product to cart'),'error');
        }
    }

    
    
    

    // public function addToCart(int $productId)
    // {
    //     if(Auth::check()){
    //         if($this->product->where('id', $productId)->where('status','0')->exists())
    //         {
    //             //Check for product color and size qty
    //             if($this->product->productColors()->count() > 1)
    //             {
    //                 if( $this->productColorSelectedQuantity != NULL)
    //                 {
    //                     $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
    //                     if($productColor->quantity > 0)
    //                     {
    //                         if($productColor->quantity > $this->quantityCount)
    //                         {
    //                             if($productColor->quantity == 0)
    //                             {
    //                                 $this->emit('message', 'warning', __('front_alert.Product color out of stock'));
    //                             }
    //                             else
    //                             {
    //                                 //Insert product to cart

    //                                 Cart::create([
    //                                     'user_id' => auth()->user()->id,
    //                                     'product_id' => $productId,
    //                                     'product_color_id' => $this->productColorId,
    //                                     'quantity' => $this->quantityCount
    //                                 ]);
    //                                 $this->emit('message', 'success', __('front_alert.Product added to cart successfully'));
        
    //                             }
                               
    //                         }
    //                         else
    //                         {
    //                             $this->emit('message', 'warning', __($productColor->quantity . ' ' . __('front_alert.Product color in stock')));
    //                         }
    //                     }
    //                     else
    //                     {
                            
    //                     }
    //                 }
    //                 else
    //                 {
    //                     $this->emit('message', 'warning','Select your product color');
    //                 }
    //             }
    //             else
    //             {
    //                 if($this->product->quantity > 0)
    //                 {
    //                     if($this->product->quantity > $this->quantityCount)
    //                     {
    //                         //Insert product to cart
    //                         Cart::create([
    //                             'user_id' => auth()->user()->id,
    //                             'product_id' => $productId,
    //                             // 'product_color_id' => $this->productColorId,
    //                             'quantity' => $this->quantityCount
    //                         ]);
    //                         $this->emit('message', 'success', __('front_alert.Product added to cart successfully'));
                           
    //                     }
    //                     else
    //                     {
    //                         $this->emit('message', 'warning', __($product->quantity . ' ' . __('front_alert.Product in stock')));
    //                     }
    //                 }
    //                 else
    //                 {
    //                     $this->emit('message', 'warning', __('front_alert.Product out of stock'));
    //                 }
    //             }
                
    //         }
    //         else
    //         {
    //             $this->emit('message', 'warning', __('front_alert.Product does not exist'));
    //         }
    //     }
    //     else
    //     {
    //         $this->emit('message', 'error', __('front_alert.Please login to add product to cart'));

    //     }
      
    // }
      // if (Auth::check()) {
        //     $product = Product::where('id', $productId)->where('status', '0')->first();
    
        //     if ($product) {
        //         if ($product->quantity > 0) {
        //             if ($product->quantity >= $this->quantityCount) {
        //                 // Define the attributes for the cart item
        //                 $attributes = [
        //                     'user_id' => auth()->id(),
        //                     'product_id' => $productId,
        //                     'product_color_id' => $this->productColorId ?? null,
        //                     'product_size_id' => $this->productSizeId ?? null,
        //                 ];
    
        //                 // Check if the cart item with these attributes already exists
        //                 $cartItem = Cart::where($attributes)->first();
    
        //                 if ($cartItem) {
        //                     // If it exists, update the quantity
        //                     // $cartItem->increment('quantity', $this->quantityCount);
        //                     $this->emit('cartUpdated');
        //                     $this->emit('message', 'warning', __('front_alert.Product already in the cart'));
        //                 } else {
        //                     // If it doesn't exist, create a new cart item
        //                     $attributes['quantity'] = $this->quantityCount;
        //                     Cart::create($attributes);
        //                     $this->emit('cartUpdated');
        //                     $this->emit('message', 'success', __('front_alert.Product added to cart successfully'));
        //                 }
        //             } else {
        //                 $this->emit('message', 'warning', __($product->quantity . ' ' . __('front_alert.Product in stock')));
        //             }
        //         } else {
        //             $this->emit('message', 'warning', __('front_alert.Product out of stock'));
        //         }
        //     } else {
        //         $this->emit('message', 'warning', __('front_alert.Product does not exist'));
        //     }
        // } else {
        //     $this->emit('message', 'error', __('front_alert.Please login to add product to cart'));
        // }
    

   
}
