<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sizes');
    }
   
    
}
