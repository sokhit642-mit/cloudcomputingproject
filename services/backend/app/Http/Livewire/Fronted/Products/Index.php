<?php

namespace App\Http\Livewire\Fronted\Products;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    // public $search;
 
    protected $queryString = [ 
        'brandInputs' => ['except' => 'as', 'brand'],
        'subcateInputs' => ['except' => 'as', 'subcategory'],
        'priceInputs' => ['except' => 'as', 'price'],
    ];
                            
    
    public $products, $category, $brand, $subcategory, $brandInputs = [], $subcateInputs = [], $priceInputs;
    public $search = '';
    public function mount($category)
    {
        $this->category = $category;

        $this->brand = Brand::where('status','0')->get();
    }
   
    public function render()
    {
       
        $this->products = Product::where('category_id',$this->category->id)
                                 ->when($this->brandInputs, function($q) {
                                    $q->whereIn('brand_id', $this->brandInputs);
                                 })
                                 ->when($this->subcateInputs, function($q) {
                                    $q->where('subcategory', $this->subcateInputs);
                                 })
                                 ->when($this->priceInputs, function($q) {

                                    $q->when($this->priceInputs == 'high-to-low', function($q2) {
                                        $q2->orderBy('selling_price','DESC');
                                    })
                                    ->when($this->priceInputs == 'low-to-high', function($q2) {
                                        $q2->orderBy('selling_price','ASC');
                                    });
                                 })
                                 ->where('status','0')->where('name', 'like', '%'.$this->search.'%')
                                 ->get();
                                 
        return view('livewire.fronted.products.index', [
            'products' => $this->products,
            'category' => $this->category,
            'brand' => $this->brand
         
            
        ]);
    }
    public function addToWishlist($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                // $this->emit('alertMessage', 'warning',__('front_alert.Already added to wishlist'));
                $this->emit('message', __('front_alert.Already added to wishlist'), 'info');

                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                $this->emit('wishlistUpdated');
                // $this->emit('alertMessage', 'success',__('front_alert.Product added to wishlist successfully'));
                $this->emit('message', __('front_alert.Product added to wishlist successfully'), 'success');

            }
        } else {
            // $this->emit('alertMessage', 'error',__('front_alert.Please login to add product to wishlist'));
            $this->emit('message', __('front_alert.Please login to add product to wishlist'), 'error');

            return false;
        }
    }
}
