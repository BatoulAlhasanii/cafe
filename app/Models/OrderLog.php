<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'status', 'user_id', 'name'];

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function order() {
        return $this->belongsTo(\App\Models\Order::class, 'order_d');
    }
}
