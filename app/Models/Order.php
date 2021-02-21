<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'status',
        'eta',
        'payment_transaction_id',
        'creditcard_last4digits',
        'customer_id',
        'order_number',
        'name',
        'surname',
        'phone',
        'email',
        'district',
        'address',
        'city_id',
        'country_id',
        'sub_total',
        'shipping_fees',
        'total',
        'expected_delivery',
        'coupon_code',
        'amount_deducted'
    ];

    public static $orderStatus = [
        1 => [
            'id' => 1,
            'name' => 'Pending'
        ],
        2 => [
            'id' => 2,
            'name' => 'Processing'
        ],
        3 => [
            'id' => 3,
            'name' => 'Paid'
        ],
        4 => [
            'id' => 4,
            'name' => 'Waiting for Delivery'
        ],
        5 => [
            'id' => 5,
            'name' => 'Delivered'
        ],
        6 => [
            'id' => 6,
            'name' => 'Failed'
        ]
    ];
    public static $statusPending = 1;
    public static $statusProcessing = 2;
    public static $statusPaid = 3;
    public static $statusWaitingForDelivery = 4;
    public static $statusDelivered = 5;
    public static $statusFailed = 6;

    public static function listOrderStatus() {
        return [
            self::$statusWaitingForDelivery,
            self::$statusDelivered
        ];
    }

    public static function rules()
    {
        return [
            'payment_transaction_id' => 'nullable',
            'creditcard_last4digits' => 'nullable',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email',
            'district' => 'nullable|string|max:255',
            'address' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'coupon_code' => 'nullable|exists:coupons,code'
        ];
    }

    public static function editRules()
    {
        return [
            'status' => ['required', Rule::in(self::listOrderStatus())]
        ];
    }

    public function orderItems()
    {
        return $this->hasMany(\App\Models\OrderItem::class, 'order_id');
    }

    public function orderLogs()
    {
        return $this->hasMany(\App\Models\OrderLog::class, 'order_id');
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_id');
    }

    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country_id');
    }
}
