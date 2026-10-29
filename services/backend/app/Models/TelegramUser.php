<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramUser extends Model
{
    use HasFactory;

    protected $table = 'telegram_users'; // Specify the table name

    protected $fillable = ['phone', 'chat_id']; // Mass assignable attributes
}
