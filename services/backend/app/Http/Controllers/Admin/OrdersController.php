<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
// use Barryvdh\DomPDF\PDF;
use App\Models\CartTotal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Mail\GoogleLoginNotification;
use Illuminate\Support\Facades\Mail; 

class OrdersController extends Controller
{
    public function index(Request $request)
    {
       
        $orders = Order::query()
        // Filter by date if provided
        ->when($request->date, function ($query) use ($request) {
            return $query->whereDate('created_at', $request->date);
        })
        // Filter by status if provided
        ->when($request->status, function ($query) use ($request) {
            return $query->where('status_message', $request->status);
        })
        // Order by created_at descending to show new orders first
        ->orderBy('created_at', 'desc')
        // Get paginated results
        ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }
    public function show(int $orderId)
    {
        $order = Order::where('id',$orderId)->first();
        $carttotal = CartTotal::all();
        if($order){
            return view('admin.orders.view', compact('order', 'carttotal'));
        }else{
            return redirect()->back()->with('message', 'No such order');
        }
    }   
    // public function updateOrderStatus(int $orderId, Request $request)
    // {
    //     $order = Order::where('id',$orderId)->first();
    //     if($order){
    //         $order->update([
    //             'status_message' => $request->order_status
    //         ]);
    //         return redirect('admin/orders/'.$orderId)->with('message', 'Order Status Updated');
    //     }else{
    //         return redirect('admin/orders/'.$orderId)->with('message', 'No such order');
    //     }
    // }
    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::findOrFail($orderId);
        
        // Update the status
        $order->update([
            'status_message' => $request->order_status
        ]);

        // Send email to the user associated with the order
        Mail::to($order->user->email)->send(new GoogleLoginNotification($order));

        return redirect('admin/orders/'.$orderId)->with('message', 'Order Status Updated');
    }

    public function viewInvoice(int $orderId)
    {
      
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }
    public function generateInvoice($orderId)
    {
        $orderId = (int) $orderId; // Ensure $orderId is an integer
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
    
        // Use the PDF facade to create a PDF instance
        $pdf = PDF::loadView('admin.invoice.generate-invoice', $data);
    
        // Configure PDF settings for better Khmer language support
        $pdf->setPaper('A4', 'portrait'); // Set paper size and orientation
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            'fontSubsetting' => true, // Ensure font subsetting for Khmer language
        ]);
    
        // Set the file name and download the PDF
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
    }
    
//     public function viewInvoice($orderId)
// {
//     $orderId = (int) $orderId; // Cast to integer
//     $order = Order::findOrFail($orderId);
//     return view('admin.invoice.generate-invoice', compact('order'));
// }

// public function generateInvoice($orderId)
// {
//     $orderId = (int) $orderId; // Cast to integer
//     $order = Order::findOrFail($orderId);
//     $data = ['order' => $order];

//     $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);

//     $todayDate = Carbon::now()->format('d-m-Y');
//     return $pdf->download('invoice'.$order->id.'-'.$todayDate.'.pdf');
// }


}
