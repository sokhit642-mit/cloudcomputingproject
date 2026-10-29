<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;

class Create extends Component
{
    public $products, $category, $subcategory, $brand, $color, $size;
    // public function mount($products, $category)
    // {
    //     $this->products = $products;
    //     $this->category = $category;
    //     $this->subcategory = $category->subcategories;
    //     $this->brand = $brands;
    //     $this->color = $category->colors;

    // }
    public $category_id;
    public $categories;
    public $selectedCategory = null;
    public $sizes = [];
    public $selectedSizes = [];
   
    public $selectedBrand = null;
    public function mount($categories, $brands)
    {
        // $this->categories = Category::where('status','0')->get();
        $this->categories = Category::where('status','0')->get();
        $this->sizes = Size::where('status','0')->get();
        $this->categories = $categories;
    
    }
    public function updatedSelectedCategory($categoryId)
    {
        // Fetch sizes for the selected category or all sizes if no category selected
        $this->sizes = $categoryId ? Size::where('category_id', $categoryId)->get() : Size::all();
        // $this->brands = $categoryId ? Brand::where('category_id', $categoryId)->get() : Brand::all();

        // if ($categoryId) {
        //     $this->brands = Brand::where('category_id', $categoryId)->get();
        // } else {
        //     $this->brands = collect();
        // }

        // $this->selectedBrand = null;
    }

    public function render()
    {
        

        $categories = Category::where('status','0')->get();
        $brands = Brand::where('status','0')->get();
        $subcategories = SubCategory::where('status','0')->get();
        $colors = Color::where('status','0')->get();
        $sizes = Size::where('status','0')->get();

    
        return view('livewire.admin.products.create', compact('categories', 'brands', 'subcategories', 'colors', 'sizes'));
    }
}
