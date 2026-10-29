<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    protected $fillable = [
        'category_id',
        'brand_id',
        'subcategory',
        'name',
        'slug',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'size',
        'trending',
        'status',
        'discount_value',  // Add this line
        'discount_type',   // Add this line
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }



    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
    
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory', 'id');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    // In Product model


    public function productColors()
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id', 'id');
    }
    
    public function getDiscountedPriceAttribute()
    {
        if ($this->discount_type === 'percentage' && $this->discount_value) {
            $discountAmount = ($this->selling_price * $this->discount_value) / 100;
            return $this->selling_price - $discountAmount;
        } elseif ($this->discount_type === 'fixed' && $this->discount_value) {
            return $this->selling_price - $this->discount_value;
        }

        return $this->selling_price; // No discount applied
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }


   
}
