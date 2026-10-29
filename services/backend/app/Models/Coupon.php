<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'usage_limit',
        'usage_count',
        'expiry_date',
        'status',
    ];

    public function isUsable()
    {
        // Check if the coupon is active, not expired, and usage count is within limit
        return $this->status === 'active' &&
               Carbon::now()->lessThanOrEqualTo($this->expiry_date) &&
               $this->usage_count < $this->usage_limit;
    }
    public function incrementUsageCount()
    {
        $this->usage_count++;
        $this->save();
    }

    public function isExpired()
    {
        return Carbon::now()->greaterThan($this->expiry_date);
    }

    
}
