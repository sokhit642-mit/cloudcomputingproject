<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;



class Index extends Component
{
    public $product_id;
    public $product_image_id;
    public $image;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    
    public function render()
    {
        $categories = Category::all();
        
        $subcategory = SubCategory::all();
        $brands = Brand::all();
        $productImage = ProductImage::all();
        $products = Product::where('name', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(5);
        return view('livewire.admin.products.index',compact('categories','subcategory','brands'),['products' => $products]);
    }
    public function deleteProduct($product_id)
    {
        
        $this->product_id = $product_id;
        // $this->product_image_id = $product_image_id;
    }
    // public function destroyProducts()
    // {
    //     // $productImage = ProductImage::findOrFail($product_image_id);
    //     $product = Product::find($this->product_id);
    //     // $productImage = ProductImage::find($this->product_image_id);
    //     // $productImage = ProductImage::findOrFail($product_image_id);
    //     if($product->productImage){
    //         // $image = 'uploads/products/'.$product->image;
    //         foreach($product->productImage as $image){
    //             if(File::exists($image->image)){
    //                 File::delete($image->image);
    //             }
                
    //         }
    //     }
    //     $product->delete();
    //     session()->flash('message','Product And Image is deleted ');
        
    // }
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
            // session()->flash('message',__('alert.Product Deleted Successfully'));
            $this->emit('message', __('alert.Product Deleted Successfully'), 'success');

        } else {
            // Flash an error message to the session if the product is not found
            session()->flash('message',__('alert.No such product found'));
        }
    }

    
    
   
}
