<?php

namespace App\Models;

// use App\Models\Size;
// use App\Models\Color;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'product_color_id',
        'product_size_id',
        'quantity'
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
    
}
