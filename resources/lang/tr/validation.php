<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */


    'email' => 'The :attribute must be a valid email address.',//
    'exists' => 'The selected :attribute is invalid.',//
    'max' => [
        'string' => 'The :attribute may not be greater than :max characters.',//
    ],
    'required' => 'The :attribute field is required.',//
    'string' => 'The :attribute must be a string.',//

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'quantity' => [
            'ValidateProductAddedQty' => 'The added quantity is not available.',
            'ValidateProductSettedQty' => 'The setted quantity is not valid.'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'TR name',
        'surname' => 'TR surname',
        'phone' => 'TR phone',
        'email' => 'TR email',
        'district' => 'TR district',
        'address' => 'TR address',
        'city_id' => 'TR city',
        'country_id' => 'TR country',
        'coupon_code' => 'TR coupon code'
    ],

];
