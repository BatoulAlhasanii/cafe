<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flavor extends Model
{
    use HasFactory;

    public $fillable = [
        'slug',
        'image',
        'sequence',
        'is_active'
    ];

    public static function rules() {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'required|boolean',
            'flavor' => 'required|array',
            'flavor.*' => 'required|array',
            'flavor.*.name' => 'required|string|max:255',
        ];
    }

    public function flavorTranslations()
    {
        return $this->hasMany(\App\Models\FlavorTranslation::class, 'flavor_id');
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'flavor_id');
    }

}
