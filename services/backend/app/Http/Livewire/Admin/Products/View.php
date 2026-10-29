<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;

class View extends Component
{
    public $product_id;
    public $product_image_id;
    public $image;
  
    public $search = '';
    
    public function render()
    {
        
        $categories = Category::where('status','0')->get();
        
        $subcategory = SubCategory::where('status','0')->get();
        $brands = Brand::where('status','0')->get();
        $productImage = ProductImage::all();
        $products = Product::where('status','0')->where('name', 'like', '%'.$this->search.'%')->get();
        return view('livewire.admin.products.view',compact('categories','subcategory','brands'),['products' => $products]);
    }
    public function deleteProduct($product_id)
    {
        
        $this->product_id = $product_id;
        // $this->product_image_id = $product_image_id;
    }
    public function destroyProducts()
    {
        // Find the product by its ID
        $product = Product::find($this->product_id);

        if ($product) {
            // Check if the product has images
            if ($product->productImages->isNotEmpty()) {
                foreach ($product->productImages as $image) {
                    // Delete image file from the file system
                    $imagePath = public_path($image->image);
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                    // Delete the image record from the database
                    $image->delete();
                }
            }

            // Now delete the product itself
            $product->delete();

            // Flash a success message to the session
            session()->flash('message',__('alert.Product Deleted Successfully'));
        } else {
            // Flash an error message to the session if the product is not found
            session()->flash('message',__('alert.No such product found'));
        }
    }
}
