<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ValidateProductAddedQty implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        if (Session::has('cart')) {
            $product = Session::get('cart')->getCartProductById(request('productId'));

            if ($product) {
                // check value type

                if ( (intval($product->qty) + intval($value)) <= intval($product->stock) ) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        //TODO
        //Check is active
        $product = \App\Models\Product::where('id',request('productId'))->first();
        if ($product) {
            if ($product->stock >= intval($value)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The added quantity is not available.';
    }
}
