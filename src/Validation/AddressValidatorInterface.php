<?php
namespace BlendisNL\InternationalAddresses\Validation;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

interface AddressValidatorInterface extends Rule
{
    /**
     * AddressValidatorInterface constructor.
     * @param Request $request
     */
    public function __construct(Request $request);

    /**
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function passes($attribute, $value);

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message();
}
