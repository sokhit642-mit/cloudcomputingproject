@extends('layouts.admin')
@section('title','Report')

@section('content')


<div>
    <div class="container-small cart">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item fw-normal"><a href="#!">Home</a></li>
                <li class="breadcrumb-item fw-normal"><a href="#!">Report</a></li>

            </ol>
        </nav>
        {{-- <h2 class="mb-5 fw-normal">My Orders<span class="text-body-tertiary fw-normal ms-2"></span></h2> --}}
        <div class="card">
            <div class="card-header">
                <form action="" method="GET">

                    <div class="row gap-6 gap-md-0 g-md-6">

                        <div class="col-md-5">
                            <label for="date_range" class="col-form-label">Filter by Date Range :</label>
                            <div class="input-group">

                                <select name="date_range" class="form-select" id="date_range">
                                    <option value="" hidden>Select Range</option>
                                    <option value="last_7_days" {{ $dateRange==='last_7_days' ? 'selected' : '' }}>Last
                                        7 Days</option>
                                    <option value="last_30_days" {{ $dateRange==='last_30_days' ? 'selected' : '' }}>
                                        Last 30 Days</option>
                                    <option value="custom" {{ $dateRange==='custom' ? 'selected' : '' }}>Custom Date
                                        Range</option>
                                </select>
                                <!-- Custom Date Range Inputs -->

                                <button type="submit" class="btn btn-label-primary" name="date_range_filter_btn">Filter
                                    by Date Range</button>
                            </div>
                            @if($dateRange === 'custom')
                            <label for="start_date">Start Date:</label>
                            <input type="date" class="form-control" name="start_date" id="start_date"
                                value="{{ $startDate }}">
                            <label for="end_date">End Date:</label>
                            <input type="date" class="form-control" name="end_date" id="end_date"
                                value="{{ $endDate }}">
                            @endif
                        </div>

                        <div class="col-md-5">
                            <label for="date_range" class="col-form-label">Filter by Period :</label>
                            {{-- <label>Filter by Status</label> --}}
                            <div class="d-flex gap-3">
                                <form method="GET" action="{{ route('admin.report.index') }}">
                                    {{-- <label for="filter">Filter Orders by:</label> --}}
                                    <div class="input-group">
                                        <select class="form-select" name="period_filter" id="period_filter">
                                            <option value="all" {{ $periodFilter==='all' ? 'selected' : '' }}>All
                                            </option>
                                            <option value="today" {{ $periodFilter==='today' ? 'selected' : '' }}>Today
                                            </option>
                                            <option value="week" {{ $periodFilter==='week' ? 'selected' : '' }}>This
                                                Week</option>
                                            <option value="month" {{ $periodFilter==='month' ? 'selected' : '' }}>This
                                                Month</option>
                                            <option value="year" {{ $periodFilter==='year' ? 'selected' : '' }}>This
                                                Year</option>
                                        </select>
                                        <button class="btn btn-label-primary" type="submit">Filter by Period</button>
                                    </div>


                                </form>
                                {{-- <button type="submit" class="btn btn-primary">Filter</button> --}}


                            </div>

                        </div>
                        <div class="col-md-2">
                            <label for="date_range" class="col-form-label">Reset:</label>

                            <a class="btn btn-primary w-100 mb-4" href="{{url('admin/report')}}">
                                <span class="d-flex align-items-center text-white justify-content-center text-nowrap"><i
                                        class='bx bx-reset me-2 mb-0'></i>Reset filter</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="row invoice-preview" id="dataTable">
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-6">
                <div class="card" id="example">
                    <div class="card invoice-preview-card p-sm-12 p-6" id="download-area">
                        <div class="card-body invoice-preview-header rounded">
                            {{-- <div
                                class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column align-items-xl-center align-items-md-start align-items-sm-center align-items-start">
                                <div class="mb-xl-0 mb-6 text-heading">
                                    <div class="d-flex svg-illustration mb-6 gap-2 align-items-center">
                                        <span class="app-brand-logo demo">

                                            <img src="{{ asset('front-assets/homesport-logo.png') }}" width="50%" alt="Success" class="img-fluid mt-1 border p-5 rounded-2">


                                        </span>
                                        
                                    </div>
                                   
                                </div>
                                <div>
                                    <h5 class="mb-6">Report #{{ $formattedToday }}</h5>

                                    <div class="mb-1 text-heading">
                                        <span>Date Issued:</span>
                                        <span class="fw-medium">{{ $dateIssued->format('F d, Y') }}</span>
                                    </div>
                                    <div class="text-heading">
                                        <span>Date Due:</span>
                                        <span class="fw-medium">{{ $dateDue->format('F d, Y') }}</span>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="">
                                <center>
                                    <table class="table w-100 h-50">
                                        <tr>
                                            <td colspan="6">
                                                <center>
                                                    <img src="{{ asset('front-assets/homesport-logo.png') }}" width="40%" alt="Success" class="img-fluid mt-1 border p-5 rounded-2 text-center">
                                                </center>
                                            </td>
                                        </tr>
                                        
                                    </table>
                                </center>
                                <center>
                                    <table>
                                        <tr>
                                            <td colspan="6">
                                                <div class="fw-medium text-center">Report : {{ $formattedToday }}</div> 
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                               <center>
                                    <table >
                                        {{-- <tr>
                                          
                                            <td>
                                                <div class="fw-medium text-center">Report : {{ $formattedToday }}</div> 
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            {{-- <td colspan="">
                                                <div class="">Form Date:</div>
                                            </td> --}}
                                            {{-- <td colspan="6">
                                             <div class="d-flex gap-2">
                                                <div class="">From Date :</div><div class="">{{ $dateIssued->format('F d, Y') }}</div>
                                             </div>
                                            </td> --}}
                                            <td colspan="6">
                                                From Date: {{ $dateIssued->format('F d, Y') }} 
                                                To Date: {{ $dateDue->format('F d, Y') }}
                                            </td>
                                            
                                            
                                            
                                        </tr>
                                        {{-- <tr>
                                            <td>
                                                <div class="">To Date:</div>
                                            </td>
                                            <td>
                                               <div class="">T{{ $dateDue->format('F d, Y') }}</div>
                                            </td>
                                        </tr> --}}
                                       
                                        <tr>
                                            <td colspan="6"></td>
                                        </tr>
                                    </table>
                               </center>
                            </div>
                        </div>
                        @php
                        $totalPrice = 0; // Initialize total price
                        @endphp
                        <center>
                            <table>
                                <thead>
                                 <tr>
                                    <th colspan="6" class="w-100"><h4>HomeSport Report</h4></th>
                                 </tr>
                                </thead>
                            </table>
                        </center>
                       
                        {{-- <h3 class="text-center mb-2"><u>HomeSport Report</u></h3> --}}
                        <div class="border-y border-translucent card-body">


                            <div class=" border-bottom border-top">
                                <table class="table fs-9 text-body mb-0 border-top border-bottom">

                                    <thead class="table table-secondary">
                                        <tr>
                                            {{-- <th></th> --}}
                                            <th style="font-size:10px;" scope="col" class="text-center text-dark">No
                                            </th>
                                            <th style="font-size:10px;" scope="col" class="text-center text-dark"
                                                style="width:180px;">Date</th>
                                            <th style="width: 150px;font-size:10px;" class="text-dark">Products</th>
                                            {{-- <th style="font-size:10px;">Color</th>
                                            <th style="font-size:10px;">Size</th> --}}
                                            <th style="font-size:10px;" width="15px" class="text-dark">Quantity</th>
                                            <th style="font-size:10px;" class="text-dark">Price(AD)</th>
                                            <th scope="col" style="width: 30px;font-size:10px;" class="text-dark">Total
                                            </th>
                                            {{-- <th scope="col" style="width: 24px;"></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @php
                                        $totalPrice = 0;
                                        @endphp

                                        @forelse ($orderItems as $orderItem)
                                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                            {{-- <td></td> --}}
                                            <td class="text-center text-dark align-middle" style="font-size:11px;">{{
                                                $loop->index + 1 }}</td>
                                            <td class="text-center text-dark align-middle" style="font-size: 11px;">
                                                {{$orderItem->created_at->format('d/m/Y')}}</td>

                                            <td class="align-middle text-dark truncate1">
                                                @if ($orderItem->product)
                                                <div class="d-flex">

                                                    <div class="truncate1" style="font-size: 11px;">
                                                        {{ $orderItem->product->name }}
                                                    </div>
                                                </div>


                                                @else
                                                No product
                                                @endif
                                            </td>
                                            <td class="align-middle text-dark" style="font-size:11px;">
                                                {{ $orderItem->quantity }}
                                            </td>
                                            <td style="font-size:11px;" class="text-dark">
                                                
                                                ${{ $orderItem->price }}.00

                                            </td>

                                            <td class="align-middle text-dark" style="font-size:11px;">
                                                ${{ number_format($orderItem->quantity * $orderItem->price, 2) }}
                                            </td>

                                            @php
                                                $totalPrice += $orderItem->quantity * $orderItem->price;
                                            @endphp
                                        </tr>

                                        </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td colspan="8" style="color: rgb(255, 0, 0);">No items added!</td>
                                        </tr>
                                        @endforelse
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                Total:
                                            </td>
                                            <td class=" text-end" class="text-center">
                                                <span class="fw-medium">${{ number_format($totalPrice, 2) }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <span class="me-2 h6">Manage report:</span>
                                                <span>{{ Auth::user()->name }}</span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>



                            </div>
                            {{-- <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table m-0 table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="align-top pe-6 ps-0 py-6 text-body">
                                                    <p class="mb-1">
                                                        <span class="me-2 h6">Manage report:</span>
                                                        <span>{{ Auth::user()->name }}</span>
                                                    </p>
                                                    <span>Thanks for your business</span>
                                                </td>
                                                <td class="px-0 py-6 w-px-100">
                                                    <p class="mb-2 border-bottom">Subtotal:</p>

                                                    <p class="mb-0">Total:</p>
                                                </td>
                                                <td class="text-end px-0 py-6 w-px-100 fw-medium text-heading">
                                                    <p class="fw-medium mb-2 border-bottom">${{
                                                        number_format($totalPrice, 2) }}</p>

                                                    <p class="fw-medium mb-0">${{ number_format($totalPrice, 2) }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                            <hr class="mt-0 mb-6">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 " style="font-size:10px;">
                                        <span class="fw-medium text-heading">Note:</span>
                                        <span>It was a pleasure working with you and your team. We hope you will keep us
                                            in mind for
                                            future freelance projects. Thank You!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card">
                    <div class="card-body">

                        <div class="">
                            <button class="btn btn-label-secondary d-grid w-100 me-4" onclick="downloadInvoice()">
                                <i class='bx bxs-file-pdf me-2 mb-0'></i>
                                Download
                            </button>
                            <button onclick="printInvoice()" class="btn btn-label-secondary d-grid w-100 mt-2">
                                <i class='bx bxs-printer me-2 mb-0'></i>
                                Print
                            </button>
                            <button id="exportButton" class="btn btn-label-secondary d-grid w-100 mt-2">
                                <i class="bx bxs-file-export me-2 md-0"></i>
                                Excel
                            </button>
                            {{-- <button id="exportButton">Export to Excel</button> --}}

                        </div>
                        {{-- <button class="btn btn-success d-grid w-100" data-bs-toggle="offcanvas"
                            data-bs-target="#addPaymentOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="bx bx-dollar bx-sm me-2"></i>Add Payment</span>
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/exceljs/dist/exceljs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/xlsx-populate/browser/xlsx-populate.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script>
    
    function printInvoice() {
        // Target the specific area to print
        const printContent = document.querySelector("#download-area").innerHTML;
        const originalContent = document.body.innerHTML;

        // Replace the entire body with the print content
        document.body.innerHTML = printContent;

        // Print the content
        window.print();
        // The destination of the user agent's print dialog becomes "save as PDF", even if it would have been "print" otherwise.
        // window.print({ saveAsPDF: true });
        // this.saveAsPDF();
        // window.download();
        // window.response({ saveAsPDF: true });
        // Restore the original body content
        document.body.innerHTML = originalContent;
    }
    
    // function downloadInvoice(paperSize) {
    //     const element = document.querySelector("#download-area");
    //     const options = {
    //         margin: [0.5, 0.5],  // Margins for the PDF
    //         filename: `report.pdf`,
    //         image: { type: 'jpeg', quality: 0.98 }, // Quality settings for images
    //         html2canvas: { 
    //             scale: 2, // Increase scale for better quality
    //             useCORS: true,
    //             scrollX: 0,
    //             scrollY: -window.scrollY
    //         },
    //         jsPDF: {
    //             unit: 'in',
    //             format: paperSize === 'a5' ? [5.83, 8.27] : [8.27, 11.69],
    //             orientation: 'portrait',
    //             autoPaging: true
    //         }
    //     };

    //     html2pdf().from(element).set(options).toPdf().get('pdf').then(pdf => {
    //         // Handling overflow and multiple pages
    //         const totalPages = pdf.internal.pages.length;
    //         pdf.internal.stream.bytes.length > 10485760 ? alert('The document is too large to handle.') : '';

    //         // Adjust page height if needed
    //         pdf.internal.pages.forEach(page => {
    //             if (page.height > pdf.internal.pageSize.height) {
    //                 pdf.addPage();
    //             }
    //         });

    //         // Save the PDF
    //         pdf.save(options.filename);
    //     }).catch(error => {
    //         console.error('Error generating PDF:', error);
    //     });
    // }


</script>
<script>
    function downloadInvoice(paperSize) {
    const { jsPDF } = window.jspdf;
    const buttons = document.querySelectorAll('.invoice-btns');

    // Hide buttons during PDF generation
    buttons.forEach(button => button.style.display = 'none');

    html2canvas(document.querySelector("#download-area"), {
        scale: 3,  // Increase scale for better resolution
        useCORS: true,
        scrollX: 0,
        scrollY: -window.scrollY
    }).then(canvas => {
        const imgData = canvas.toDataURL("image/png");

        let pdf;
        let width, height;

        if (paperSize === 'a5') {
            width = 148; // A5 width in mm
            height = 210; // A5 height in mm
            pdf = new jsPDF('p', 'mm', [width, height]);
        } else {
            width = 210; // A4 width in mm
            height = 297; // A4 height in mm
            pdf = new jsPDF('p', 'mm', 'a4'); // Default to A4
        }

        const imgWidth = width; // PDF width
        const imgHeight = canvas.height * imgWidth / canvas.width;
        let position = 0;
        const pageHeight = height;

        pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
        let heightLeft = imgHeight - pageHeight;
        
        while (heightLeft > 0) {
            position = heightLeft - imgHeight;
            pdf.addPage();
            pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;
        }

        pdf.save(`Report-{{ $formattedToday }}.pdf`);

        // Show buttons again after PDF generation
        buttons.forEach(button => button.style.display = 'flex');
    }).catch(error => {
        console.error('Error generating PDF:', error);

        // Show buttons if there is an error
        buttons.forEach(button => button.style.display = 'flex');
    });
}
</script>




{{-- <script>
    document.getElementById('exportButton').addEventListener('click', function() {
        const table = document.getElementById('dataTable');
        const ws = XLSX.utils.table_to_sheet(table);  // Converts the table to a sheet

        // Set column widths
        ws['!cols'] = [
            { wch: 3 },   // Width for the "NO." column
            { wch: 10 },  // Width for the "Date" column
            { wch: 40 },  // Width for the "Products" column
            { wch: 8 },   // Width for the "Quantity" column
            { wch: 8 },   // Width for the "Price" column
            { wch: 8 },   // Width for the "Total" column
        ];

        // Loop through each cell to add the '$' symbol to the "Price" and "Total" columns
        const range = XLSX.utils.decode_range(ws['!ref']); // Decode range for all rows
        for (let row = range.s.r; row <= range.e.r; row++) {
            for (let col = range.s.c; col <= range.e.c; col++) {
                const cellAddress = { r: row, c: col };
                const cellRef = XLSX.utils.encode_cell(cellAddress);
                const cell = ws[cellRef];

                if (cell && (col === 5 || col === 6)) {  // Column 4 (Price) and Column 5 (Total)
                    // Check if the cell contains a number
                    if (typeof cell.v === 'number') {
                        // Add the "$" symbol and format as currency
                        cell.s = cell.s || {};  // Initialize style if not defined
                        cell.s.numFmt = '"$"#,##0.00';  // Currency format with "$"
                    }
                }
            }
        }

        // Create a new workbook and append the sheet
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

        // Write the Excel file to the user's computer
        XLSX.writeFile(wb, 'table_report.xlsx');
    });
</script> --}}

<script>
    document.getElementById('exportButton').addEventListener('click', function () {
        const table = document.getElementById('dataTable');
        const ws = XLSX.utils.table_to_sheet(table); // Converts the table to a sheet
        
        // Set column widths
        ws['!cols'] = [
            { wch: 3 },   // Width for the "NO." column
            { wch: 10 },  // Width for the "Date" column
            { wch: 40 },  // Width for the "Products" column
            { wch: 8 },   // Width for the "Quantity" column
            { wch: 8 },   // Width for the "Price" column
            { wch: 8 },   // Width for the "Total" column
        ];

        // Manually update the specific cell for "From Date"
        const range = XLSX.utils.decode_range(ws['!ref']); // Decode range of the worksheet
        for (let row = range.s.r; row <= range.e.r; row++) {
            for (let col = range.s.c; col <= range.e.c; col++) {
                const cellRef = XLSX.utils.encode_cell({ r: row, c: col });
                const cell = ws[cellRef];

                if (cell && typeof cell.v === 'string' && cell.v.includes('{{')) {
                    // Replace the placeholder with the actual text
                    cell.v = 'From Date: November 24, 2024'; // Replace with dynamic value
                }

                // Add $ to Price and Total columns
                if (cell && (col === 4 || col === 5)) { // Adjust for your Price and Total columns
                    if (!isNaN(cell.v)) {
                        cell.v = `$${parseFloat(cell.v).toFixed(2)}`;
                    }
                }
            }
        }

        // Create a new workbook and append the sheet
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

        // Write the Excel file to the user's computer
        XLSX.writeFile(wb, 'report.xlsx');
    });
</script>

{{-- <script src="https://cdn.jsdelivr.net/npm/exceljs/dist/exceljs.min.js"></script>

<script>
    document.getElementById('exportButton').addEventListener('click', async function () {
        // Create a new workbook using ExcelJS
        const workbook = new ExcelJS.Workbook();
        const worksheet = workbook.addWorksheet('Sheet1');

        // Add a title row or merge cells for header
        worksheet.mergeCells('A1:F6'); // Merge cells where the image will go
        const headerCell = worksheet.getCell('A1');
        headerCell.alignment = { vertical: 'middle', horizontal: 'center' };

        // Load the image as a base64 string
        const imageUrl = "{{ asset('front-assets/homesport-logo.png') }}";
        const base64Image = await fetch(imageUrl)
            .then(response => response.blob())
            .then(blob => {
                return new Promise((resolve, reject) => {
                    const reader = new FileReader();
                    reader.onloadend = () => resolve(reader.result);
                    reader.onerror = reject;
                    reader.readAsDataURL(blob);
                });
            });

        // Add the image to the workbook
        const imageId = workbook.addImage({
            base64: base64Image.split(',')[1], // Remove "data:image/png;base64,"
            extension: 'png',
        });

        // Position the image in the merged cells
        worksheet.addImage(imageId, {
            tl: { col: 0, row: 0 }, // Top-left cell
            br: { col: 5, row: 5 }, // Bottom-right cell
        });

        // Add your table content
        worksheet.addRow(['NO.', 'Date', 'Products', 'Quantity', 'Price', 'Total']);
        worksheet.addRow([1, 'November 24, 2024', 'Product A', 2, 20.0, 40.0]);

        // Adjust column widths
        worksheet.columns = [
            { width: 3 },
            { width: 10 },
            { width: 40 },
            { width: 8 },
            { width: 8 },
            { width: 8 },
        ];

        // Export the workbook to an Excel file
        const buffer = await workbook.xlsx.writeBuffer();
        const blob = new Blob([buffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'table_report_with_image.xlsx';
        link.click();
    });
</script>
     --}}



    

@endpush