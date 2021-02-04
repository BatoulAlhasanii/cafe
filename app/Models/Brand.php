<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public $fillable = [
        'image',
        'is_active'
    ];

    public static function rules() {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'required|boolean',
            'brand.*.name' => 'required|string|max:255'
        ];
    }

    public function brandTranslations()
    {
        return $this->hasMany(\App\Models\BrandTranslation::class, 'brand_id');
    }
}
