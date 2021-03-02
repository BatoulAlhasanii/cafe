<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlavorTranslation extends Model
{
    use HasFactory;

    public $fillable = [
        'flavor_id',
        'name',
        'lang'
    ];

    public function flavor()
    {
        return $this->belongsTo(\App\Models\Flavor::class, 'flavor_id');
    }
}
