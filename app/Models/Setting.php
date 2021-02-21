<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Rules\ValidateSettingValue;

class Setting extends Model
{
    use HasFactory;

    public static $activateDiscountName = 'activate_discount';

    public $fillable = [
        'setting_name',
        'setting_label',
        'setting_value',
        'setting_type'
    ];

    public static function rules() {
        return [
            'setting_value' => ['required', new ValidateSettingValue()]
        ];
    }
}
