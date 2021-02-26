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

    public static function getMaxTotalToPayShippingFee() {
        $setting = self::where('setting_name', 'max_total_to_pay_shipping_fee')->first();
        if ($setting && is_numeric($setting->setting_value) && floatval($setting->setting_value) >= 0) {
            return floatval($setting->setting_value);
        } else {
            return 70;
        }
    }
}
