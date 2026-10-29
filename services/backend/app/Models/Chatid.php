<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatid extends Model
{
    use HasFactory;
    protected $table = 'telegram_chat_ids';

    protected $fillable = [
        'chat_id'
    ];
}
