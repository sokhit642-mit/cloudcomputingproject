<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Merchantbakongkhqr;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::where('status', '0')->orderBy('created_at','desc')->paginate(5);
        $coupons = Coupon::where('expiry_date', '>=', Carbon::now())->get();
        // Total counts
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();

        // User counts
        $totalAllUsers = User::count();
        $totalUser = User::where('role_as', '0')->count(); // Regular users
        $totalAdmin = Admin::where('role', '1')->count(); // Admin users

        // Date-based statistics
        $todayDate = Carbon::now()->toDateString(); // e.g., '2024-11-21'
        $thisMonth = Carbon::now()->month; // Current month (numeric)
        $thisYear = Carbon::now()->year; // Current year

        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at', $thisYear)->count();

        // Get monthly income for this year
        $monthlyIncome = Orderitem::selectRaw('MONTH(order_items.created_at) as month, SUM(order_items.price) as total')
            ->whereYear('order_items.created_at', Carbon::now()->year)  // Filter by the current year
            ->groupBy('month')  // Group by month to sum the total
            ->orderBy('month')  // Optional: Order by the month (ascending)
            ->get()
            ->keyBy('month');  // Key the results by the month for easy access

        // Set a sales target for the current month (e.g., $10,000)
        $monthlyTarget = 10000;

        // Retrieve the sales for the current month, default to 0 if not available
        $salesThisMonth = $monthlyIncome[$thisMonth]->total ?? 0;

        // Calculate the sales percentage for this month
        $salesPercentage = $monthlyTarget > 0 ? round(($salesThisMonth / $monthlyTarget) * 100) : 0;

        // Calculate the percentage change compared to the previous month
        $previousMonth = $thisMonth == 1 ? 12 : $thisMonth - 1; // Handle the case where it's January
        $salesLastMonth = $monthlyIncome[$previousMonth]->total ?? 0; // Sales from last month, default to 0
        $percentageChange = 0;

        // Calculate the percentage change only if there was sales in the previous month
        if ($salesLastMonth > 0) {
            // If current month sales are greater than last month's sales
            $percentageChange = round((($salesThisMonth - $salesLastMonth) / $salesLastMonth) * 100);
        } elseif ($salesLastMonth == 0 && $salesThisMonth > 0) {
            // If previous month's sales were 0 and current month has sales, assume 100% increase
            $percentageChange = 100;
        } elseif ($salesLastMonth == 0 && $salesThisMonth == 0) {
            // If both months have no sales, no change
            $percentageChange = 0;
        } elseif ($salesThisMonth < $salesLastMonth) {
            // If current month's sales are less than the previous month
            $percentageChange = round((($salesThisMonth - $salesLastMonth) / $salesLastMonth) * 100);
        }
        
        // Optional: Format the percentage to include a negative sign if the percentage is less than zero
        // $formattedPercentage = $percentageChange < 0 ? `-${abs($percentageChange)}%` : `{$percentageChange}%`;
        
        
        $bakong = Merchantbakongkhqr::first();
        // $topSellingProducts = OrderItem::select('product_id', \DB::raw('SUM(quantity) as total_sold'))
        //                                 ->groupBy('product_id')
        //                                 ->orderBy('total_sold', 'DESC')
        //                                 ->take(10) // Get the top 10 products
        //                                 ->get();
        $topSellingProducts = OrderItem::topSelling()
        ->with('product', 'product.brand', 'product.productImages')
        ->get();




    
    

        // Passing data to the view
        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalBrands',
            'totalAllUsers',
            'totalUser',
            'totalAdmin',
            'totalOrder',
            'todayOrder',
            'thisMonthOrder',
            'thisYearOrder',
            'monthlyIncome',
            'salesPercentage',
            'percentageChange',
            'salesThisMonth',
            'salesLastMonth',
            'coupons',
            'products',
            'bakong',
            'topSellingProducts'
        ));
    }

}
