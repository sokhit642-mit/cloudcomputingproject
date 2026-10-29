<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function view(){
        $today = Carbon::today(); // Get today's date
        $formattedToday = $today->format('FdmY'); // Format it

      
        // Initialize query
        $query = OrderItem::with('product.productImages', 'productColor.color', 'productSize.size');
    
        // Initialize default issued and due dates
        $dateIssued = Carbon::now();
        $dateDue = Carbon::now()->addMonth(); // Default to 1 month later
    
        // Apply period filter
       
    
        // Apply single date filter if selected
        if ($date) {
            $dateIssued = Carbon::parse($date);
            $dateDue = Carbon::parse($date)->addDays(7); // Custom example, due 7 days later
            $query->whereDate('created_at', Carbon::parse($date));
        }
        $reportNumber = OrderItem::count() + 1;
        $orderItems = $query->get();
        return view('admin.report.view-report', compact('orderItems', 'periodFilter', 'dateRange', 'startDate', 'endDate', 'date', 'dateIssued', 'dateDue', 'formattedToday'));
    }
    public function index(Request $request)
    {
        $today = Carbon::today(); // Get today's date
        $formattedToday = $today->format('dmY'); // Format it

        // Retrieve filter inputs
        $periodFilter = $request->input('period_filter', 'all');
        $dateRange = $request->input('date_range', '');
        $date = $request->input('date');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // Initialize query
        $query = OrderItem::with('product.productImages', 'productColor.color', 'productSize.size');
    
        // Initialize default issued and due dates
        $dateIssued = Carbon::now();
        $dateDue = Carbon::now()->addMonth(); // Default to 1 month later
    
        // Apply period filter
        if ($periodFilter !== 'all') {
            switch ($periodFilter) {
                case 'today':
                    $dateIssued = Carbon::today();
                    $dateDue = Carbon::today()->addDays(7); // Due after 7 days for example
                    $query->whereDate('created_at', Carbon::today());
                    break;
                case 'week':
                    $dateIssued = Carbon::now()->startOfWeek();
                    $dateDue = Carbon::now()->endOfWeek(); // End of this week
                    $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'month':
                    $dateIssued = Carbon::now()->startOfMonth();
                    $dateDue = Carbon::now()->endOfMonth(); // End of this month
                    $query->whereMonth('created_at', Carbon::now()->month);
                    break;
                case 'year':
                    $dateIssued = Carbon::now()->startOfYear();
                    $dateDue = Carbon::now()->endOfYear(); // End of this year
                    $query->whereYear('created_at', Carbon::now()->year);
                    break;
            }
        }
    
        // Apply date range filter
        if ($dateRange) {
            switch ($dateRange) {
                case 'last_7_days':
                    $dateIssued = Carbon::now()->subDays(6);
                    $dateDue = Carbon::now(); // End today
                    $query->whereBetween('created_at', [Carbon::now()->subDays(6), Carbon::now()]);
                    break;
                case 'last_30_days':
                    $dateIssued = Carbon::now()->subDays(29);
                    $dateDue = Carbon::now(); // End today
                    $query->whereBetween('created_at', [Carbon::now()->subDays(29), Carbon::now()]);
                    break;
                case 'custom':
                    if ($startDate && $endDate) {
                        $dateIssued = Carbon::parse($startDate);
                        $dateDue = Carbon::parse($endDate); // Custom range's end date
                        $query->whereBetween('created_at', [Carbon::parse($startDate), Carbon::parse($endDate)]);
                    }
                    break;
            }
        }
    
        // Apply single date filter if selected
        if ($date) {
            $dateIssued = Carbon::parse($date);
            $dateDue = Carbon::parse($date)->addDays(7); // Custom example, due 7 days later
            $query->whereDate('created_at', Carbon::parse($date));
        }
        $reportNumber = OrderItem::count() + 1;
        $orderItems = $query->get();
    
        // Pass dateIssued and dateDue to the view
        return view('admin.report.index', compact('orderItems', 'periodFilter', 'dateRange', 'startDate', 'endDate', 'date', 'dateIssued', 'dateDue', 'formattedToday'));
    }
    
    



}
