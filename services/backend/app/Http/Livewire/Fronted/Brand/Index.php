<?php

namespace App\Http\Livewire\Fronted\Brand;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    
    public $products, $category, $brand, $subcategory, $brandInputs = [], $subcateInputs = [], $priceInputs;
    protected $queryString = [ 
        'brandInputs' => ['except' => 'as', 'brand'],
        'subcateInputs' => ['except' => 'as', 'subcategory'],
        'priceInputs' => ['except' => 'as', 'price'],
    ];
        
    public function mount($brand)
    {
        $this->brand= $brand;

        // $this->brand = Brand::where('status','0')->get();
    }
//     public function mount($brandId)
// {
//     $this->brand = Brand::find($brandId);
// }
    public function render()
{
    

    return view('livewire.fronted.brand.index', [
        'brand' => $this->brand
    ]);
}

    
}
