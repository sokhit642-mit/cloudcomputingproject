<?php

namespace App\Http\Livewire\Fronted\Products;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class NewArrval extends Component
{
    protected $queryString = [ 
        'brandInputs' => ['except' => 'as', 'brand'],
        // 'categoryInputs' => ['except' => 'as', 'category'],
        'subcateInputs' => ['except' => 'as', 'subcategory'],
        'priceInputs' => ['except' => 'as', 'price'],
    ];
                            
    
    public $newArrivalProduct, $category, $brand, $subcategories, $brandInputs = [], $subcateInputs = [], $categoryInputs = [], $priceInputs;
    public $search = '';
    public function mount() {
        // Ensure $brand is always an array or collection
        $this->brand = Brand::where('status', '0')->get(); // Assuming you have a Brand model
        $this->subcategories = SubCategory::where('status', '0')->get(); // Assuming you have a SubCategory model
        $this->newArrivalProduct = Product::where('status', '0')->get(); // Assuming you have a Product model
        $this->category = Category::where('status', '0')->get();
    }
    public function render()
    {
        $this->newArrivalProduct = Product::query()
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
        ->latest()
        ->get();


        return view('livewire.fronted.products.new-arrval');
    }
}
