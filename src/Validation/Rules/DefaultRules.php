<?php
namespace BlendisNL\InternationalAddresses\Validation\Rules;

class DefaultRules
{
    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @var array
     */
    protected $messages = [];

    /**
     * DefaultRules constructor.
     */
    public function __construct()
    {
        $this->rules = [
            'street' => ['required', 'max:64'],
            'house_number' => ['required', 'max:16'],
            'house_number_extension' => ['nullable', 'max:16'],
            'city' => ['required', 'max:64'],
            'postal_code' =>  ['required'],
        ];

        $this->messages =  [
            'street.required' => __('international-addresses::validation.street.required'),
            'street.max' => __('international-addresses::validation.street.max'),
            'house_number.required' => __('international-addresses::validation.house_number.required'),
            'house_number.max' => __('international-addresses::validation.house_number.max'),
            'house_number_extension.max' => __('international-addresses::validation.house_number.extension_max'),
            'postal_code.required' => __('international-addresses::validation.postal_code.required'),
            'postal_code.max' => __('international-addresses::validation.postal_code.max'),
            'postal_code.regex' => __('international-addresses::validation.postal_code.regex'),
            'city.required' => __('international-addresses::validation.city.required'),
            'city.max' => __('international-addresses::validation.street.max'),
        ];
    }

    /**
     * @return array
     */
    public function getRules()
    {
        $this->overrideRules();
        return $this->rules;
    }

    public function overrideRules()
    {
        // Implement in Rules class
    }

    public function getMessages()
    {
        $this->overrideMessages();
        return $this->messages;
    }

    public function overrideMessages()
    {
        // Implement in Rules class
    }
}
