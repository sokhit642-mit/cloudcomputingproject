<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class Edit extends Component
{
    public $product_id;
    public $products;
    public $categories;
  
 
    public $brands;
   
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
     

        return view('livewire.admin.products.edit', [
            'products' => $this->product,
            'categories' => Category::all(), // Adjust as per your needs
            'brands' => Brand::all(), // Adjust as per your needs
            'sizes' => Size::all(), // Adjust as per your needs
            'colors' => Color::all(), // Adjust as per your needs
            'subcategory' => SubCategory::all(), // Adjust as per your needs
        ]);
    }
}

