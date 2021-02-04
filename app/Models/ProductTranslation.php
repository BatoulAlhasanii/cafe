<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'product_id',
        'name',
        'unit',
        'description',
        'attribute_value',
        'lang'
    ];
}
