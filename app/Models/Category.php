<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $coffeeId = 1;

    public $fillable = [
        'slug',
        'image',
        'sequence',
        'parent_id',
        'is_active'
    ];

    public static function rules() {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'required|boolean',
            'category.*.name' => 'required|string|max:255'
        ];
    }

    public function categoryTranslations()
    {
        return $this->hasMany(\App\Models\CategoryTranslation::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'category_id');
    }
}
