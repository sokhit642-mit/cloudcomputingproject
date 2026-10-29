<?php

namespace App\Models;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CartTotal extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'total_amount', 'total_discount','coupon_id'];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    }
    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id', 'id');
    // }


   
}
