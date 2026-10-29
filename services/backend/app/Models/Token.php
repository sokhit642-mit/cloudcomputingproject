<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Token;

class Token extends Model
{
    use HasFactory;
    
    protected $table = 'tokens';

    protected $fillable = ['name', 'token'];

   
}
