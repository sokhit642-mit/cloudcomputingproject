<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Http\Request;

class Index extends Component
{
    public function render(Request $request)
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
            ->paginate(100);
    
        return view('livewire.admin.order.index', compact('orders'));
    }
}
