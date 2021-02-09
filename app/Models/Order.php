<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'status',
        'eta',
        'payment_transaction_id',
        'creditcard_last4digits',
        'customer_id',
        'name',
        'surname',
        'postcode',
        'phone1',
        'phone2',
        'address',
        'city_id',
        'country_id',
        'sub_total',
        'shipping_fees',
        'total',
        'lat',
        'lng',
        'expected_delivery',
        'coupon_code',
        'amount_deducted'
    ];

    public static $orderStatus = [
        1 => [
            'id' => 1,
            'name' => 'pending'
        ],
        2 => [
            'id' => 2,
            'name' => 'processing'
        ],
        3 => [
            'id' => 3,
            'name' => 'paid'
        ],
        4 => [
            'id' => 4,
            'name' => 'delivered'
        ],
        5 => [
            'id' => 5,
            'name' => 'declined'
        ]
    ];
    public static $statusPending = 1;
    public static $statusProcessing = 2;
    public static $statusPaid = 3;
    public static $statusDelivered = 4;
    public static $statusDeclined = 5;


    public static function rules()
    {
        return [
            'payment_transaction_id' => 'nullable',
            'creditcard_last4digits' => 'nullable',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'postcode' => 'nullable|string|max:255',
            'phone1' => 'required|string|max:255',
            'phone2' => 'required|string|max:255',
            'address' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'coupon_code' => 'nullable|exists:coupons,code'
        ];
    }

    public function orderItems()
    {
        return $this->hasMany(\App\Models\OrderItem::class, 'order_id');
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
