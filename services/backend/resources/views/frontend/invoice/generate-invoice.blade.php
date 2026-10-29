<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>invoice#{{$order->id}}</title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('admin-das/image-removebg-preview.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin-das/image-removebg-preview.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin-das/image-removebg-preview.png')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- <link rel="stylesheet" href="style.css"> --}}
        <style>
           *,
*::after,
*::before{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

:root{
    --blue-color: #0c2f54;
    --dark-color: #535b61;
    --white-color: #fff;
}

ul{
    list-style-type: none;
}
ul li{
    margin: 2px 0;
}

/* text colors */
.text-dark{
    color: var(--dark-color);
}
.text-blue{
    color: var(--blue-color);
}
.text-end{
    text-align: right;
}
.text-center{
    text-align: center;
}
.text-start{
    text-align: left;
}
.text-bold{
    font-weight: 700;
}
/* hr line */
.hr{
    height: 1px;
    background-color: rgba(0, 0, 0, 0.1);
}
/* border-bottom */
.border-bottom{
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

body{
    font-family: 'Poppins', sans-serif,Khmer OS Battambang;
    color: var(--dark-color);
    font-size: 14px;
}
.invoice-wrapper{
    min-height: 100vh;
    background-color: rgba(0, 0, 0, 0.1);
    padding-top: 20px;
    padding-bottom: 20px;
}
.invoice{
    max-width: 850px;
    margin-right: auto;
    margin-left: auto;
    background-color: var(--white-color);
    padding: 70px;
    /* border: 1px solid rgba(0, 0, 0, 0.2); */
    border-radius: 5px;
    min-height: 920px;
}
.invoice-head-top-left img{
    width: 130px;
}
.invoice-head-top-right h3{
    font-weight: 500;
    font-size: 27px;
    color: var(--blue-color);
}
.invoice-head-middle, .invoice-head-bottom{
    padding: 16px 0;
}
.invoice-body{
    /* border: 1px solid rgba(0, 0, 0, 0.1); */
    border-radius: 4px;
    overflow: hidden;
}
.invoice-body table{
    border-collapse: collapse;
    border-radius: 4px;
    width: 100%;
}
.invoice-body table td, .invoice-body table th{
    padding: 12px;
}
.invoice-body table tr{
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.invoice-body table thead{
    background-color: rgba(0, 0, 0, 0.004);
}
.invoice-body-info-item{
    display: grid;
    grid-template-columns: 80% 20%;
}
.invoice-body-info-item .info-item-td{
    padding: 12px;
    background-color: rgba(0, 0, 0, 0.02);
}
.invoice-foot{
    padding: 30px 0;
}
.invoice-foot p{
    font-size: 12px;
}
.invoice-btns{
    margin-top: 20px;
    display: flex;
    justify-content: center;
}
.invoice-btn{
    padding: 3px 9px;
    color: var(--dark-color);
    font-family: inherit;
    border: 1px solid rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

.invoice-head-top, .invoice-head-middle, .invoice-head-bottom{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    padding-bottom: 10px;
}

@media screen and (max-width: 992px){
    .invoice{
        padding: 40px;
    }
}

@media screen and (max-width: 576px){
    .invoice-head-top, .invoice-head-middle, .invoice-head-bottom{
        grid-template-columns: repeat(1, 1fr);
    }
    .invoice-head-bottom-right{
        margin-top: 12px;
        margin-bottom: 12px;
    }
    .invoice *{
        text-align: left;
    }
    .invoice{
        padding: 28px;
    }
}

.overflow-view{
    overflow-x: scroll;
}
.invoice-body{
    min-width: 600px;
}

@media print{
    .print-area{
        visibility: visible;
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        overflow: hidden;
    }

    .overflow-view{
        overflow-x: hidden;
    }

    .invoice-btns{
        display: none;
    }
    .color-block {
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin-right: 5px;
    }
    .invoice {
        /* General print styles */
        width: 100%;
        margin: 0;
        padding: 0;
        border: none;
    }

    /* Adjust for A4 paper size */
    @page {
        size: A4;
        margin: 20mm;
    }
    
    /* Example of different styling for A5 */
    @media print and (size: A5) {
        @page {
            size: A5;
            margin: 15mm;
        }
    }
}

        </style>
        
    </head>
    <body>

        <div class = "invoice-wrapper" id = "print-area">
            <div class = "invoice" id="download-area">
                <div class = "invoice-container">
                    <div class = "invoice-head">
                        <div class = "invoice-head-top">
                            <div class = "invoice-head-top-left text-start">
                                <img src="{{ asset('front-assets/homesport-logo.png') }}" alt="Success" class="">

                            </div>
                            <div class = "invoice-head-top-right text-end">
                                <h3>@lang('order-d.invoice')</h3>
                            </div>
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-middle">
                            <div class = "invoice-head-middle-left text-start">
                                <p><span class = "text-bold">@lang('order-d.date')</span>:  {{$order->created_at->format('d-m-Y')}}</p>
                            </div>
                            <div class = "invoice-head-middle-right text-end">
                                <p><spanf class = "text-bold">@lang('order-d.invoice_no'):</span>{{$order->id}}</p>
                            </div>
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-bottom">
                            <div class = "invoice-head-bottom-left">
                                <ul>
                                    <p><span class = "text-bold">@lang('order.tracking_no')</span>:  {{$order->tracking_no}}</p>
                                    <p><span class = "text-bold">@lang('order.order_date')</span>:  {{$order->created_at->format('d-m-Y')}}</p>
                                    <p><span class = "text-bold">@lang('checkout.full_name')</span>:  {{$order->fullname}}</p>
                                    <p><span class = "text-bold">@lang('checkout.email')</span>:  {{$order->email}}</p>
                                    <p><span class = "text-bold">@lang('checkout.phone_number')</span>:  {{$order->phone}}</p>
                                    <p><span class = "text-bold">@lang('checkout.address')</span>:  {{$order->address}}</p>
                                    
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div class = "overflow-view">
                        <div class = "invoice-body">
                            <table>
                                <thead style="border-top: 1px solid rgba(0, 0, 0, 0.178);border-bottom: 1px solid rgba(0, 0, 0, 0.1);" style="">
                                    <tr>
                                        {{-- <td class = "text-bold">#</td> --}}
                                        <td class = "text-bold">@lang('admin_dash.product')</td>
                                        <td class = "text-bold">@lang('admin_dash.color')</td>
                                        <td class = "text-bold">@lang('admin_dash.size')</td>
                                        <td class = "text-bold">@lang('order-d.qty')</td>
                                        <td class = "text-bold">Amount</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @forelse ($order->orderItems as $orderItem)
                                        <tr>
                                            {{-- <td>{{$order->id}}</td> --}}
                                            <td style="word-wrap: break-word;width:300px;display:flex;">
                                                @if ( $orderItem->product->productImages)
                                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}" alt="" width="53" class=" rounded-3" style="margin-right: 5px;">  
                                                @else
                                                    <img src="" alt="" width="53" class=" rounded-3">  
                                                @endif
                                                <div style="margin-top: 5px;">
                                                    {{ $orderItem->product->name }}
                                                </div>
                                            </td>
                                            <td class=" fs-6">
                                                @if ($orderItem->productColor)
                                                {{$orderItem->ProductColor->color->name}}
                                               
                                                <div class="color-block" style="background-color: {{$orderItem->ProductColor->color->code}};"></div>
                                                {{-- <label for="" style="background-color: {{$orderItem->ProductColor->color->code}}"></label> --}}
                                                @else
                                                <div class="color white-space-nowrap text-body-tertiary fs-10 fw-normal">
                                                    @lang('cart.noColor')</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($orderItem->productSize)
                                                    {{$orderItem->ProductSize->size->name}}
                                                @else
                                                    <div class="size white-space-nowrap text-body-tertiary fs-9 fw-normal">
                                                    @lang('cart.noSize')</div>
                                                @endif
                                            </td>
                                            <td class = "text-end">{{ $orderItem->quantity}}</td>
                                            <td> ${{ $orderItem->quantity * $orderItem->product->discounted_price }}.00</td>
                                            @php
                                                $totalPrice += $orderItem->quantity * $orderItem->product->discounted_price; 
                                            @endphp
                                        </tr>
                                    @empty
                                    <tr class="text-center">
                                        
                                        <td colspan="7" style="color: rgb(255, 0, 0);">No item Added!!!</td>
                                    </tr>
                                    @endforelse
                                 
                                </tbody>
                                {{-- <tbody>

                                    <tr>
                                       <td colspan="4" class="bg-light-2 text-end"><strong>Sub Total:</strong></td>
                                       <td class="bg-light-2 ">${{ $totalPrice }}.00</td>
                                    </tr>
                                    <tr>
                                       <td colspan="4" class="bg-light-2 text-end"><strong>Discount:</strong></td>
                                       <td class="bg-light-2 ">$0.00</td>
                                    </tr>
                                    <tr>
                                       <td colspan="4" class="bg-light-2 text-end border-0"><strong>Total:</strong></td>
                                       <td class="bg-light-2  border-0">${{ $totalPrice }}.00</td>
                                    </tr>
                                </tbody> --}}
                                <tbody>

                                    <tr>
                                       <td colspan="4" class="bg-light-2 text-end"><strong>Sub Total:</strong></td>
                                       <td class="bg-light-2 ">${{ $orderItem->price }}.00</td>
                                    </tr>
                                    @if ($orderItem->coupon_code == 'N/A')
                                        
                                    @else
                                        <tr>
                                            <td colspan="4" class="bg-light-2 text-end"><strong>Coupon:</strong></td>
                                            <td class="bg-light-2">
                                                
                                                @if ($orderItem->discount_type == 'percent')
                                                    <div class="fs-11">
                                                        {{ $orderItem->coupon_code }}(-{{$orderItem->discount_value}}%)
                                                    </div>
                                                @else
                                                <div class="fs-11">
                                                    {{ $orderItem->coupon_code }}(-${{$orderItem->discount_value}})
                                                </div>  
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    
                                    <tr>

                                        <td colspan="4" class="bg-light-2 text-end"><strong>Discount:</strong></td>
                                        <td class="bg-light-2 " style="color: red">
                                            @if ($orderItem->total_discount == 0)
                                                -$0.00
                                            @else
                                                -${{  number_format($orderItem->total_discount, 2)}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                       <td colspan="4" class="bg-light-2 text-end border-0"><strong>Total:</strong></td>
                                       <td class="bg-light-2  border-0">${{ $orderItem->price }}.00</td>
                                    </tr>
                                </tbody>

                            </table>
                            {{-- <div class = "invoice-body-bottom">
                                <div class = "invoice-body-info-item border-bottom">
                                    <div class = "info-item-td text-end text-bold">Sub Total:</div>
                                    <div class = "info-item-td text-end">${{ $totalPrice }}.00</div>
                                </div>
                              
                                <div class = "invoice-body-info-item">
                                    <div class = "info-item-td text-end text-bold">Total:</div>
                                    <div class = "info-item-td text-end">${{ $totalPrice }}.00</div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class = "invoice-foot text-center">
                        <p><span class = "text-bold text-center">@lang('home.Thank you for support with Sport_menu')</span></p>

                        <div class = "invoice-btns">
                            <button type = "button" class = "invoice-btn" onclick="printInvoice()">
                                <span>
                                    <i class="fa-solid fa-print"></i>
                                </span>
                                <span>Print</span>
                            </button>
                            <button type = "button" class = "invoice-btn" onclick="downloadInvoice()">
                                <span>
                                    <i class="fa-solid fa-download"></i>
                                </span>
                                <span>Download</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <script src = "script.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    
        <script>
            function printInvoice() {
                window.print();
            }
    
            function downloadInvoice(paperSize) {
            const { jsPDF } = window.jspdf;
            const buttons = document.querySelectorAll('.invoice-btns');

            // Hide buttons during PDF generation
            buttons.forEach(button => button.style.display = 'none');

            html2canvas(document.querySelector("#download-area"), {
                scale: 2,  // Adjust scale if needed
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

                pdf.save(`invoice_{{{$order->id}}}.pdf`);

                // Show buttons again after PDF generation
                buttons.forEach(button => button.style.display = 'flex');
            }).catch(error => {
                console.error('Error generating PDF:', error);

                // Show buttons if there is an error
                buttons.forEach(button => button.style.display = 'flex');
            });
        }
        </script>
    </body>
</html>