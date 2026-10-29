<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontDetial extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'front_detail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'facebook',
        'telegram',
        'instagram',
        'youtube',
        'tiktok',
        'phonenumber1',
        'phonenumber2',
        'phonenumber3',
        'abouthomesport',
    ];
}
