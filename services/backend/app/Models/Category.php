<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'descripion',
        'image',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    // public function relatedproducts()
    // {
    //     return $this->hasMany(Product::class, 'category_id', 'id')->latest()->skip(1);
    // }
    public function relatedproductsCategory()
    {
        // Count total products with status '0' in the same category
        $totalProducts = $this->hasMany(Product::class, 'category_id', 'id')
                              ->count();
    
        // Return the relationship with products having status '0', ordered by latest, excluding the most recent one
        return $this->hasMany(Product::class, 'category_id', 'id')
                    ->where('status', '0')
                    ->latest()
                    ->take(max(0, $totalProducts - 1));
    }
    

    public function relatedproductsBrand()
    {
        $totalProducts = $this->hasMany(Product::class, 'category_id', 'id')->count();

        return $this->hasMany(Product::class, 'category_id', 'id')
                    ->where('status', '0')
                    ->latest()
                    ->take($totalProducts - 1);
    }
    public function brands()
    {
        return $this->hasMany(Brand::class, 'category_id', 'id')->where('status','0');
    }
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id')->where('status','0');
    }
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }


    // // Product.php
    // public function productSizes()
    // {
    //     return $this->hasMany(ProductSize::class); // or belongsToMany if using a pivot table
    // }

    // // ProductSize.php
    // public function size()
    // {
    //     return $this->belongsTo(Size::class);
    // }
    

}
