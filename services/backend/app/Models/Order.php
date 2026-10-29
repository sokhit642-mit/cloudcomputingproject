<?php

namespace App\Models;

use App\Models\Orderitem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order'; // Specify the table name if it doesn't follow Laravel's naming convention

    // Define the fillable attributes
    protected $fillable = [
        'user_id',
        'tracking_no',
        'fullname',
        'phone',
        'email',
        'address',
        'status_message',
        'payment_mode',
        'payment_id',
    ];

    /**
     * Get all the orderItems for the Order
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function orderItems(): HasMany
    {
        return $this->hasMany(Orderitem::class, 'order_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Make sure 'user_id' exists in your orders table
    }

    // public function items()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }
}
