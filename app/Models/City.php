<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $fillable = [
        'country_id',
        'shipping_fees',
        'is_active'
    ];

    public static function rules() {
        return [
            'country_id' => 'required|exists:countries,id',
            'shipping_fees' => 'required|decimal:2',
            'is_active' => 'required|boolean',
            'city.*.name' => 'required|string|max:255'
        ];
    }

    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country_id');
    }

    public function cityTranslations()
    {
        return $this->hasMany(\App\Models\CityTranslation::class, 'city_id');
    }
}
