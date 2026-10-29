<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Add role to fillable properties
        'image',
    ];

    protected $hidden = [
        'password',
    ];

    protected $attributes = [
        'role' => 1, // Set default role value
    ];
}

