<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'category_id',
        'brand_id',
        'slug',
        'price',
        'discount_price',
        'images',
        'unit_amount',
        'sku',
        'stock',
        'is_featured',
        'is_active'
    ];

    public static function rules() {
        return [
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|decimal:2',
            'discount_price' => 'nullable|decimal:2',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'unit_amount' => 'nullable|integer',
            'sku' => 'required|string|max:255',
            'stock' => 'required|integer',
            'is_featured' => 'required|boolean',
            'is_active' => 'required|boolean',
            'product' => 'required|array',
            'product.*' => 'required|array',
            'product.*.name' => 'required|string|max:255',
            'product.*.unit' => 'nullable|string|max:255',
            'product.*.description' => 'nullable|string',
            'product.*.attribute_value' => 'nullable|string'
        ];
    }

    public function brand()
    {
        return $this->belongsTo(\App\Models\Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function productTranslations()
    {
        return $this->hasMany(\App\Models\ProductTranslation::class, 'product_id');
    }
    public function getCurrentPrice() {
        if ($this->discount_price !== 0.00) {
            return $this->discount_price;
        } else {
            return $this->price;
        }
    }
}
