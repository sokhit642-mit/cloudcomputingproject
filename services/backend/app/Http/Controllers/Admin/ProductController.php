<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Brand;
// use App\Models\SubCategory;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSize;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function getSubcategories($category_id)
    {
        $subcategories = SubCategory::where('category_id', $category_id)->get();

        return response()->json($subcategories);
    }
    public function getSizes($category_id)
    {
        $sizes = Size::where('category_id', $category_id)->get();
        return response()->json($sizes);
    }


    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }
    public function view()
    {
        $products = Product::all();
        return view('admin.products.view',compact('products'));
    }
    public function create()
    {
        $categories = Category::where('status','0')->get();
        $brands = Brand::where('status','0')->get();
        $subcategory = SubCategory::where('status','0')->get();
        $colors = Color::where('status','0')->get();
        $sizes = Size::where('status','0')->get();
        return view('admin.products.create', compact('categories','brands','subcategory','colors'));
    }
    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
    
        $category = Category::findOrFail($validatedData['category_id']);
        $brand = Brand::findOrFail($validatedData['brand_id']);
    
        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'brand_id' => $validatedData['brand_id'],
            'subcategory' => $validatedData['subcategory'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'discount_value' => $validatedData['discount_value'] ?? null,
            'discount_type' => $validatedData['discount_type'] ?? null,
        ]);
    
        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';
            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extension;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;
    
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
    
        if($request->colors) {
            foreach($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0,
                ]);
            }
        }
    
        if($request->sizes) {
            foreach($request->sizes as $key => $size) {
                $product->productSizes()->create([
                    'product_id' => $product->id,
                    'size_id' => $size,
                    'quantity' => $request->sizequantity[$key] ?? 0,

                ]);
            }
        }
    
        return redirect('admin/products')->with('message',__('alert.Product_added_success'));
    }
    
    public function edit(int $product_id)
    {
        $products = Product::findOrFail($product_id); // First, get the product
        $categories = Category::where('status', '0')->get();
        $brands = Brand::where('status', '0')->get();
        
        // Now you can fetch subcategories based on the product's category ID
        $subcategories = Subcategory::where('category_id', $products->category_id)->where('status', '0')->get();
        
        $product_color = $products->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $product_color)->get();
        
        $product_size = $products->productSizes->pluck('size_id')->toArray();
        $sizes = Size::whereNotIn('id', $product_size)->where('category_id', $products->category_id)->get();
        
        // $product_sizes = $products->productSizes->pluck('pivot.quantity', 'pivot.size_id')->toArray(); // For pre-selecting sizes and quantities.
    
        // Load sizes based on the product’s selected category
        // $sizes = Size::where('category_id', $products->category_id)->get();
        
        return view('admin.products.edit', compact('categories', 'brands', 'subcategories', 'products', 'colors', 'sizes'));
    }
    
    // public function update(ProductFormRequest $request, int $product_id)
    // {
    //     $validatedData = $request->validated();

    //     $category = Category::findOrFail($validatedData['category_id']);
    //     $product = $category->products()->where('id', $product_id)->first();


        
    //     $product = Category::findOrFail($validatedData['category_id'])
    //                         ->products()->where('id',$product_id)->first();
        
       
    //     if ($product) 
    //     {
            
    //         $product->update([
    //             'category_id' => $validatedData['category_id'],
    //             'subcategory' => $validatedData['subcategory'],
    //             'name' => $validatedData['name'],
    //             'slug' => Str::slug($validatedData['slug']),
    //             'brand' => $validatedData['brand'],
    //             'description' => $validatedData['description'],
    //             'original_price' => $validatedData['original_price'],
    //             'selling_price' => $validatedData['selling_price'],
    //             'quantity' => $validatedData['quantity'],
    //             'trending' => $request->trending == true ? '1':'0',
    //             'status' => $request->status == true ? '1':'0',
    //         ]);

    //         if($request->hasFile('image')){
    //             $uploadPath = 'uploads/products/';

    //             $i = 1;
    //             foreach($request->file('image') as $imageFile){
    //                 $extention = $imageFile->getClientOriginalExtension();
    //                 $filename = time().$i++.'.'.$extention;
    //                 $imageFile->move($uploadPath,$filename);
    //                 $finalImagePathName = $uploadPath.$filename;

    //                 $product->productImages()->create([
    //                     'product_id' => $product->id,
    //                     'image' => $finalImagePathName,
    //                 ]);
    //             }
    //         }
       
    //         return redirect('admin/products')->with('message','Product Updated Succesfully');

    //     } 
    //     else 
    //     {
    //         return redirect('admin/products')->with('message','No Such Product Id Found');
    //     }
        
    // }
    public function update(ProductFormRequest $request, int $product_id)
    {
        // Validate the incoming request data
        $validatedData = $request->validated();

        // Find the product independently of the category
        $product = Product::findOrFail($product_id);

        // Update the product with the validated data
        $product->update([
            'category_id' => $validatedData['category_id'],
            'brand_id' => $validatedData['brand_id'],
            'subcategory' => $validatedData['subcategory'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            
            'trending' => $request->trending == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'discount_value' => $validatedData['discount_value'] ?? null,
            'discount_type' => $validatedData['discount_type'] ?? null,
        ]);

        // Handle image uploads if any
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extension;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;

                // Create a new product image record
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        if($request->colors) {
            foreach($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0,
                ]);
            }
        }
        if($request->sizes) {
            foreach($request->sizes as $key => $size) {
                $product->productSizes()->create([
                    'product_id' => $product->id,
                    'size_id' => $size,
                    'quantity' => $request->sizequantity[$key] ?? 0,

                ]);
            }
        }
        // Redirect to the products list with a success message
        return redirect('admin/products')->with('message',__('alert.Product Updated Successfully'));
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image))
        {
            File::delete($productImage->image);
        }
        $productImage->delete();
        // return redirect()->back();
        // Session::flash('message', 'Product Image Deleted');
        return redirect()->back()->with('message', 'Product Image Deleted');
       
    }
    public function destroyColor(int $product_color_id)
    {
        $productColor = ProductColor::findOrFail($product_color_id);
        $productColor->delete();
        return redirect()->back()->with('message','Product Color Deleted');
    }
    public function destroySize(int $product_size_id)
    {
        $productSize = ProductSize::findOrFail($product_size_id);
        $productSize->delete();
        return redirect()->back()->with('message','Product Size Deleted');
    }
    public function getSizesByCategory($categoryId)
    {
        $category = Category::with('sizes')->find($categoryId);
        if ($category) {
            return response()->json($category->sizes);
        } else {
            return response()->json([]);
        }
    }
    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0',
            'prod_size_id' => 'required|exists:prod_sizes,id',
        ]);

        $prodSize = ProductSize::findOrFail($request->input('prod_size_id'));
        $prodSize->quantity = $request->input('quantity');
        $prodSize->save();

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Quantity updated successfully.');
    }
    public function updateProductSizeQty(Request $request, $prod_size_id)
    {
        $productSizeData = Product::findOrFail($request->products_id)
                            ->productSizes()->where('id',$prod_size_id)->first();
        $productSizeData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message' => 'Quantity updated successfully.']);
    }
    public function updateProductColorQty(Request $request, $prod_color_id)
    {
        $productSizeData = Product::findOrFail($request->products_id)
                            ->productColors()->where('id',$prod_color_id)->first();
        $productSizeData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message' => 'Quantity updated successfully.']);
    }

    public function search(Request $request)
    {
        $query = $request->get('query', '');
    
        // Fetch products with category and images
        $products = Product::with(['productImages', 'category'])
            ->where('name', 'like', '%' . $query . '%')
            ->take(10)
            ->get();
    
        // Transform products into JSON-friendly format
        $products = $products->map(function ($product) {
            return [
                'name' => $product->name,
                'image' => $product->productImages->isNotEmpty() 
                            ? asset($product->productImages[0]->image) 
                            : asset('default.jpg'), // Placeholder image
                'url' => url('/collections/' . $product->category->slug . '/' . $product->slug),
            ];
        });
    
        return response()->json($products);
    }
    

    
    

    
}

