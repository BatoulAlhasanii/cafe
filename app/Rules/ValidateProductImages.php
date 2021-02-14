<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateProductImages implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

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

        if(request('id')) {

            if(!empty(request('deleted_images'))) {
                $product = \App\Models\Product::find(request('id'));
                $arrayOfProductImages = explode(',', $product->images);
                $arrayOfDeletedImages = explode(',', request('deleted_images'));

                foreach ($arrayOfDeletedImages as $deletedImage) {
                    if (!in_array($deletedImage, $arrayOfProductImages, true)) {
                        return false;
                    }
                }

                if ((count($arrayOfProductImages) === count($arrayOfDeletedImages)) && !request('images')) {
                    return false;
                }

            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'All images are deleted without uploading new ones.';
    }
}
