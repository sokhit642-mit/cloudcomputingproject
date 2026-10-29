<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .card {
            border-radius: 12px;
            overflow: hidden;
            margin: 30px auto;
            max-width: 700px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: none;
            background-color: #ffffff;
        }
        .card-header {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .card-header h1 {
            font-size: 24px;
            margin: 0;
        }
        .card-header p {
            font-size: 16px;
            margin: 0;
        }
        .card-body {
            padding: 20px;
        }
        .order-details {
            margin-bottom: 20px;
        }
        .order-item {
            border: 1px solid #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }
        .order-item p {
            margin: 5px 0;
        }
        .status-message {
            text-align: center;
            padding: 10px;
            border: 2px solid #28a745;
            color: #28a745;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 20px;
        }
        .total-amount {
            text-align: center;
            font-size: 20px;
            color: #007bff;
            font-weight: bold;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #6c757d;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>
<body>
    @php
        $totalAmount = 0;
    @endphp

    <div class="card">
        <div class="card-header">
            <h1>Order Confirmation</h1>
            <p>Order Date: <strong>{{ $order->created_at->format('Y-m-d') }}</strong></p>
        </div>
        <div class="card-body">
            <h3 class="text-primary">Hello, {{ $order->user->name }}</h3>
            @foreach($order->orderItems as $item)

                <div class="order-details">
                    {{-- <h4>Order Details</h4> --}}
                    <div class="order-item">
                        <p><strong>Product:</strong> Manchester United adidas Home Shirt 2023-24</p>
                        <p><strong>Size:</strong>
                            @if ($item->productSize && $item->productSize->size)
                                {{ $item->productSize->size->name }}
                            @else
                                <span class="text-muted">No size</span>
                            @endif

                        </p>
                        <p><strong>Color:</strong> 
                            @if ($item->productSize && $item->productSize->color)
                                {{ $item->productSize->color->name }}
                            @else
                                <span class="text-muted">No color</span>
                            @endif

                        </p>
                        {{-- <p><strong>Payment Method:</strong> 
                            {{ $order->payment_mode }}  
                        </p> --}}
                        <p><strong>Price:</strong> ${{ $item->price }}</p>
                        <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
                    </div>
                </div>
            @endforeach
            @php
                $totalAmount += $item->quantity * $item->price;
            @endphp
            <div class="total-amount">Total: ${{ number_format($totalAmount, 2) }}</div>

            <div class="status-message">
                Your order is {{ $order->status_message }}
            </div>
        </div>
        <div class="footer">
            Thank you for shopping with us! We look forward to serving you again.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
