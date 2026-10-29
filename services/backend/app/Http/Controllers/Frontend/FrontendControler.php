<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendControler extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $category = Category::where('status', '0')->get();
        $trendingProducts = Product::where('status', '0')->where('trending', '0')->latest()->take(15)->get();
        $brand = Brand::where('status', '0')->get();
        $products = Product::where('status', '0')->take(8)->get();
        $newArrivalProduct = Product::where('status', '0')->latest()->take(14)->get();

        // Count the user's orders
        

        return view('frontend.index', compact('sliders', 'category', 'brand', 'products', 'trendingProducts', 'newArrivalProduct'));
}

    public function newArrival()
    {
        $newArrivalProduct = Product::where('status','0')->latest()->take(14)->get();

    }
    public function categories()
    {
        $categories = Category::where('status','0')->get(); 
        return view('frontend.collections.category.index', compact('categories'));
    }
    public function brands()
    {
        $brand = Brand::where('status','0')->get();
        return view('frontend.collections.products.brand.index', compact('brand'));
    }
    public function products($category_slug)
    {
        $category = Category::where('status','0')->where('slug',$category_slug)->first();
        if ($category) {
            // $products = $category->products()->get();
            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
        
    }
    public function productsByBrand($brand_slug)
    {
        $brand = Brand::where('status','0')->where('slug', $brand_slug)->first();
    
        if ($brand) {
            $products = $brand->products()->get();
            return view('frontend.collections.products.products-bybrand', compact('brand', 'products'));
        } else {
            return redirect()->back();
        }
    }
    
    
    public function products_all()
    {
        // $category = Category::where('slug',$category_slug)->first();
        // if ($category) {
            
        //     return view('frontend.collections.products.index', compact('category'));
        // } else {
        //     return redirect()->back();
        // }
        $product = Product::where('status','0')->get();
        $category = Category::where('status','0')->get();
        $brand = Brand::where('status','0')->get();
        return view('frontend.collections.products.all-products', compact('product', 'category','brand'));

        
    }
    public function products_newArrivals()
    {
        // $newArrivalProduct = Product::where('status','0')->latest()->get();
        $newArrivalProduct = Product::where('status','0')->latest()->take(4)->get();

        return view('frontend.collections.products.newArrival', compact('newArrivalProduct'));
    }
    public function products_trending()
    {
        
        $trendingProducts = Product::where('status','0')->where('trending','1')->take(4)->get();

        return view('frontend.collections.products.trending', compact('trendingProducts'));
    }
    // public function productView(string $category_slug, string $product_slug)
    // {
    //     $category = Category::where('slug',$category_slug)->first();
    //     if ($category) {

    //         $product = $category->products()->where('slug',$product_slug)->where('status','0')->first();
    //         if ($product) 
    //         {
    //             return view('frontend.collections.products.view', compact('product','category'));
    //         }else {
    //             return redirect()->back();
    //         }
    //         // return view('frontend.collections.products.index', compact('category'));
    //     } else {
    //         return redirect()->back();
    //     }
    // }
    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug',$category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug',$product_slug)->first();
            if ($product)
            {
                return view('frontend.collections.products.view', compact('product','category'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function thankyou()
    {
        return view('frontend.thankyou');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function userprofile()
    {
        $userOrderCount = Order::where('user_id', Auth::user()->id)->count();
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('frontend.userprofile.index' , compact('userOrderCount','orders'));
    }
    public function editprofile()
    {
        $userOrderCount = Order::where('user_id', Auth::user()->id)->count();
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('frontend.userprofile.edit', compact('userOrderCount','orders'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:2048',
            'old_password' => 'nullable|string|min:8',
            'password' => 'nullable|string|min:8|confirmed', // Use 'confirmed' for password confirmation
        ]);

        // Check old password and update password if a new one is provided
        if ($request->filled('password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'The provided password does not match your current password.']);
            }
            $user->password = Hash::make($validated['password']);
        }

        // Update profile details
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->address = $validated['address'];

        // Handle profile image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image && file_exists(public_path('uploads/profile/' . $user->image))) {
                unlink(public_path('uploads/profile/' . $user->image));
            }

            // Move the new image to 'uploads/profile'
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/profile'), $imageName);
            $user->image = $imageName; // Save the filename in the database
        }

        // Save user updates
        $user->save();

        // Return success message
        return redirect()->back()->with('message', 'Profile updated successfully', 'success');
    }
    public function editpassword()
    {
        return view('frontend.userprofile.edit-password');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password','warning');
        }
    }
   

    

}
