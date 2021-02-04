<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $fillable = [
        'is_active'
    ];

    public static function rules() {
        return [
            'is_active' => 'required|boolean',
            'country.*.name' => 'required|string|max:255'
        ];
    }

    public function cities()
    {
        return $this->hasMany(\App\Models\City::class, 'country_id');
    }

    public function countryTranslations()
    {
        return $this->hasMany(\App\Models\CountryTranslation::class, 'country_id');
    }
}
