<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class ReportPdfController extends Controller
{
    public function generatePdf()
    {
        $today = Carbon::now();
        $dateIssued = $today; // This is a Carbon instance
        $dateDue = $today->copy()->addMonth(); // This is a Carbon instance

        // Format for the report number
        $formattedToday = $today->format('F d, Y');
        $formattedDue = $dateDue->format('F d, Y');

        // Fetch data for the report
        $orderItems = OrderItem::with('product.productImages', 'productColor.color', 'productSize.size')
            ->whereDate('created_at', $today) // Example filter
            ->get();

        // Prepare data to be passed to the view
        $data = [
            'title' => 'Sample PDF Report',
            'dateIssued' => $dateIssued,
            'dateDue' => $dateDue,
            'formattedToday' => $formattedToday, // Pass the formatted date
            'formattedDue' => $formattedDue, // Pass the formatted due date
            'orderItems' => $orderItems,
        ];

        // Load the view with data and generate PDF
        $pdf = Pdf::loadView('admin.report.pdf-report', $data);

        // Return the PDF as a download
        return $pdf->download('pdf-report.pdf');
    }
}