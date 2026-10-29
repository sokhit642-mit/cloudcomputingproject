<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub-categories';

    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
