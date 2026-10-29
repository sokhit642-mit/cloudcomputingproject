<?php


use App\Models\TelegramUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Route;
use Barryvdh\Snappy\Facades\SnappyPdf;

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Admin\Brand\Index;


use App\Http\Controllers\TokenController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\QrscanController;
use App\Http\Controllers\Admin\Frontdetail;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\GoogleAuthController;


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\BakongController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\FacebookAuthController;
use App\Http\Controllers\TelegramAuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TelegramController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportPdfController;
use App\Http\Controllers\Admin\AdminloginController;
use App\Http\Controllers\Admin\RenewtokenController;
use App\Http\Controllers\Frontend\FrontendControler;
use App\Http\Controllers\Frontend\WishlistControler;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Frontend\CheckoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google_auth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callback']);

Route::get('auth/facebook', [FacebookAuthController::class, 'facebookpage']);
Route::get('auth/facebook/callback', [FacebookAuthController::class, 'facebookredirect']);

// Route::get('/auth/telegram/callback', [TelegramAuthController::class, 'handleTelegramCallback']);
Route::get('/auth/telegram/callback', [TelegramAuthController::class, 'handleTelegramCallback'])->name('telegram.callback');
Route::post('/auth/telegram/callback', [TelegramAuthController::class, 'handleTelegramCallback'])->name('telegram.callback');

Route::get('/KHQR', [QrscanController::class, 'index']);

Route::get('/locale/{locale}', function ($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});
Route::get('/brands/locale/{locale}', function ($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});
Route::get('/collections/locale/{locale}', function ($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});
Route::get('/collections/{category_slug}/locale/{locale}', function ($category_slug,$locale){
    Session::put('locale',$locale);
    return redirect()->back();
});

// Route::group(['prefix' => '{locale}', 'middleware' => 'setLocale'], function () {
//     Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
// });

// Route::get('/orders/{orderId}/locale/{locale}', function ($orderId, $locale) {
//     // Validate locale
//     if (!in_array($locale, ['en', 'kh'])) {
//         abort(400, 'Invalid locale');
//     }

//     // Validate the order
//     $order = \App\Models\Order::where('user_id', Auth::id())->where('id', $orderId)->first();

//     if (!$order) {
//         abort(404, 'Order not found');
//     }

//     // Store the locale in the session
//     Session::put('locale', $locale);

//     // Redirect back or to the order page
//     return redirect()->route('order.show', ['orderId' => $orderId]);
// })->name('orders.locale');


Route::get('/',[FrontendControler::class, 'index']);
Route::get('/collections',[FrontendControler::class, 'categories']);
Route::get('/brands',[FrontendControler::class, 'brands']);
Route::get('/collections/{category_slug}', [FrontendControler::class, 'products']);
Route::get('/brands/{brand_slug}', [FrontendControler::class, 'productsByBrand']);
// Route::get('products/by-brand/{brand_slug}', [FrontendControler::class,'productsByBrand'])->name('products.by.brand');
Route::get('/all-products', [FrontendControler::class, 'products_all']);
Route::get('/newArrivals', [FrontendControler::class, 'products_newArrivals']);
Route::get('/trending', [FrontendControler::class, 'products_trending']);
Route::get('/collections/{category_slug}/{product_slug}', [FrontendControler::class, 'productView']);
Route::get('/about-us', [FrontendControler::class, 'about']);
Route::get('/thank-you',[FrontendControler::class, 'thankyou']);
Route::post('/userlogout', [LoginController::class, 'userlogout'])->name('user.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistControler::class, 'index']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{orderId}', [OrderController::class, 'show']);
    Route::get('/invoice/{orderId}', [OrderController::class,'viewInvoice']);
    Route::get('/invoice/{orderId}/generate', [OrderController::class,'generateInvoice']);
});

Route::post('/checkout/apply-coupon', [CouponController::class, 'applyCoupon'])->name('checkout.apply-coupon');

Auth::routes();

// Route::post('admin/login',[AdminloginController::class,'index'])->name('adminLogin.sub');
// Route::get('admin/login',[AdminloginController::class,'index']);

// Route::post('admin/logoutadmin', [AdminloginController::class, 'logoutadmin'])->name('logoutadmin');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth:admin', 'is_admin'])->group(function (){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('frontdetail', [Frontdetail::class, 'index']);
    Route::post('frontdetail', [Frontdetail::class, 'store']);
    Route::get('/logout',[App\Http\Controllers\Admin\DashboardController::class,'logout'])->name('admin.logout');
    //categories
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/{user}/view', [UserController::class, 'view'])->name('user.view');

    Route::get('/admins', [AdminController::class, 'index']);
    Route::get('/{admin}/view', [AdminController::class, 'view'])->name('admin.view');
    Route::get('/create', [AdminRegisterController::class, 'create']);
   
    Route::get('admin/{id}/edit', [AdminRegisterController::class, 'edit'])->name('admin.edit');
    Route::put('admin/{id}', [AdminRegisterController::class, 'update'])->name('admin.update');
    Route::put('superadmin/{id}', [AdminRegisterController::class, 'updatesuperadmin'])->name('update.superadmin');

    Route::get('/report',[ReportController::class, 'index'])->name('admin.report.index');
    Route::get('/report/view-report',[ReportController::class, 'view']);
    // Route::get('generate-report-pdf', [ReportPdfController::class, 'generatePdf'])->name('generate.pdf');
    Route::get('/generate-report-pdf', [ReportPdfController::class, 'generatePdf'])->name('generate.pdf');
 
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index')->name('admin.category');
        Route::get('category/create','create');
        Route::post('category','store');
        Route::get('category/{category}/edit','edit');
        Route::put('category/{category}','update');
        Route::get('category/{category}/view','view');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('products', 'index');
        Route::get('products-cart', 'view');
        Route::get('products/create','create');
        Route::post('products','store');
        Route::get('products/{product}/edit','edit');
        Route::put('products/{product}','update');
        Route::get('product-image/{product_image_id}/delete','destroyImage');
        Route::get('product-color/{product_color_id}/delete','destroyColor');
        Route::get('product-size/{product_size_id}/delete','destroySize');
        Route::post('/product-size/{product_size_id}', 'updateProductSizeQty');
        Route::post('/product-color/{product_color_id}', 'updateProductColorQty');
        


    });
    Route::controller(SliderController::class)->group(function () {
        Route::get('sliders', 'index');
        Route::get('sliders/create','create');
        Route::post('sliders','store');
        Route::get('sliders/{slider}/edit','edit');
        Route::put('sliders/{slider}','update');
        // Route::get('product-image/{product_image_id}/delete','destroyImage');

    });

    Route::get('/colors', [ColorController::class, 'index']);
    Route::get('/sizes', [SizeController::class, 'index']);
    Route::get('/brands', [BrandController::class, 'index']);
    Route::get('/sub-category', [SubcategoryController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'index']);
    

    Route::get('/coupons', [CouponController::class, 'index'])->name('coupons.index');
    Route::get('/coupons/create', [CouponController::class, 'create'])->name('coupons.create');
    Route::post('/coupons/store', [CouponController::class, 'store'])->name('coupons.store');
    Route::get('/coupons/{coupon}/edit',[CouponController::class, 'edit']);
    Route::put('/coupons/{coupon}',[CouponController::class, 'update']);

    Route::get('/discounts',[DiscountController::class, 'index']);
    // Route::put('/products/{id}', [ProductController::class, 'updateQuantity'])->name('updateQuantity');

    // Route::get('category',[CategoryController::class, 'index']);
    // Route::get('category/create',[CategoryController::class, 'create']);
    // Route::post('category',[CategoryController::class, 'store']);
    // Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);
    // Route::get('sub-category',App\Http\Livewire\Admin\SubCategory\Index::class)->name('admin.sub-category');
    // Route::get('/colors',App\Http\Livewire\Admin\Colors\Index::class);
    // Route::get('/sizes',App\Http\Livewire\Admin\Sizes\Index::class);

    // Route::get('sliders',App\Http\Livewire\Admin\Sliders\Index::class);
    Route::get('/locale/{locale}', function ($locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });
    Route::get('/brands/locale/{locale}', function ($locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });
    Route::get('/orders/locale/{locale}', function ($locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });
    Route::get('/sliders/locale/{locale}', function ($locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });
    Route::get('/category/locale/{locale}', function ($locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });
    Route::get('/products/locale/{locale}', function ($locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });
    Route::get('/category/{category_id}/locale/{locale}', function ($category_id,$locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });
    Route::get('/sliders/{sliders_id}/locale/{locale}', function ($sliders_id,$locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });
    Route::get('/products/{product_id}/locale/{locale}', function ($product_id,$locale){
        Session::put('locale',$locale);
        return redirect()->back();
    });

    ///order
    Route::controller(OrdersController::class)->group(function () {
        Route::get('orders', 'index');
        Route::get('/orders/{orderId}','show');
        Route::put('/orders/{orderId}','updateOrderStatus');

        Route::get('/invoice/{orderId}','viewInvoice');
        Route::get('/invoice/{orderId}/generate','generateInvoice');

    });

    Route::get('/telegram-change-chat-id', [TelegramController::class, 'showFormcgange']);
    Route::post('/save-telegram-chat-id', [TelegramController::class, 'saveTelegramChatId'])->name('saveTelegramChatId');
    Route::get('/telegram-get-chat-id', [TelegramController::class, 'showFormget']);
    Route::get('/telegram-get-chat-id/get', [TelegramController::class, 'getChatId'])->name('getChatId');

    Route::get('/bakongkhqr', [BakongController::class, 'bakong']);
    Route::post('/save-decoded-data', [BakongController::class, 'saveDecodedData'])->name('saveDecodedData');
 
    Route::get('/view-khqr', [BakongController::class, 'viewkhqr']);
    
    // Route::post('/save-token', [RenewtokenController::class, 'saveToken']);
    // Route::post('/save-token', [RenewtokenController::class, 'saveToken'])->name('saveToken');
    // Route::post('/save-token', [TokenController::class, 'saveToken']);
    // Route::post('/save-token', [TokenController::class, 'saveToken']);
    // Route::post('/save-renew-token', [RenewtokenController::class, 'saveRenewTokenData'])->name('saveRenewtokenData');

    // Route::post('/save-token', [TokenController::class, 'saveToken'])->name('save.token');
    Route::post('/save-token', [TokenController::class, 'store'])->name('save.token');





});

Route::get('admin/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('adminRegister');
Route::post('admin/register', [AdminRegisterController::class, 'register'])->name('adminRegister.submit');

Route::get('admin/login', [AdminloginController::class, 'index'])->name('adminLogin');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('adminLogin.submit');
Route::post('admin/logout', [AdminAuthController::class, 'logoutadmin'])->name('adminLogout');

// Admin routes
// Route::middleware(['auth', 'is_admin'])->group(function () {
//     Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// });
Route::post('/api/telegram/webhook', [OrdersController::class, 'handleTelegramWebhook']);
Route::post('/link-telegram', [OrdersController::class, 'linkTelegramAccount'])->name('linkTelegram');

Route::get('/subcategories/{category_id}', [ProductController::class, 'getSubcategories']);
Route::get('/get-sizes/{category_id}', [ProductController::class, 'getSizes']);

Route::get('/profile',[FrontendControler::class, 'userprofile']);
Route::get('/edit-profile',[FrontendControler::class, 'editprofile']);
Route::put('/user/profile/update', [FrontendControler::class, 'updateprofile'])->name('userprofile.update');
Route::get('/edit-password',[FrontendControler::class, 'editpassword']);
Route::post('change-password', [FrontendControler::class, 'changePassword']);


Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot.password.form');
Route::post('forgot-password', [AuthController::class, 'sendResetToken'])->name('send.reset.token');
Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('reset.password');

// Route::get('/product-search', [ProductController::class, 'search'])->name('products.search');
Route::get('/search-products', [ProductController::class, 'search']);


Route::get('superadmin/create', [AdminRegisterController::class,'createsup']);
Route::post('superadmin/create' ,[AdminRegisterController::class,'superadminstore'])->name('superadmin.store');


