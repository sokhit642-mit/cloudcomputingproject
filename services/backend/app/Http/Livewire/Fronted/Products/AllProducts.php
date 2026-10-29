<?php

namespace App\Http\Livewire\Fronted\Products;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

class AllProducts extends Component
{
    protected $queryString = [ 
        'brandInputs' => ['except' => 'as', 'brand'],
        // 'categoryInputs' => ['except' => 'as', 'category'],
        'subcateInputs' => ['except' => 'as', 'subcategory'],
        'priceInputs' => ['except' => 'as', 'price'],
    ];
                            
    
    public $products, $category, $brand, $subcategories, $brandInputs = [], $subcateInputs = [], $categoryInputs = [], $priceInputs;
    public $search = '';
    public function mount($category) {
        // Ensure $brand is always an array or collection
        $this->brand = Brand::where('status', '0')->get(); // Assuming you have a Brand model
        $this->subcategories = SubCategory::where('status', '0')->get(); // Assuming you have a SubCategory model
        $this->products = Product::where('status', '0')->get(); // Assuming you have a Product model
        $this->category = Category::where('status', '0')->get();
    }

    public function render()
    {
        
        $this->products = Product::query()
        ->when($this->brandInputs, function($q) {
            $q->whereIn('brand_id', $this->brandInputs);
        })
        ->when($this->subcateInputs, function($q) {
            $q->whereIn('subcategory', $this->subcateInputs);
        })
        ->when($this->priceInputs, function($q) {
            $q->when($this->priceInputs == 'high-to-low', function($q2) {
                $q2->orderBy('selling_price', 'DESC');
            })
            ->when($this->priceInputs == 'low-to-high', function($q2) {
                $q2->orderBy('selling_price', 'ASC');
            });
        })
        ->where('status', '0')
        ->where('name', 'like', '%' . $this->search . '%')
        ->get();

        return view('livewire.fronted.products.all-products');

    
        // return view('livewire.fronted.products.all-products');
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
