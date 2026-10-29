<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orderitem extends Model
{
    use HasFactory;
    protected $table = 'order_items'; // Specify the table name if it doesn't follow Laravel's naming convention

    // Define the fillable attributes
    protected $fillable = [
        'order_id',
        'product_id',
        'product_color_id',
        'product_size_id',
        'quantity',
        'price',
        'coupon_code',
        'discount_value',
        'total_discount',
        'discount_type'
    ];
    public function productColor():BelongsTo
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id', 'id');
    }

    public function ProductSize():BelongsTo
    {
        return $this->belongsTo(ProductSize::class, 'product_size_id', 'id');
    }


    /**
     * Get the product that owns the cart
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }

    public function scopeTopSelling($query, $limit = 3)
    {
        return $query->select('product_id', \DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderBy('total_sold', 'DESC')
            ->take($limit);
    }

}
