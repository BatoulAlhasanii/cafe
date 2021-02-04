<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'city_id',
        'lang'
    ];

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_id');
    }
}
