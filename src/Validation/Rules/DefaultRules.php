<?php
namespace BlendisNL\InternationalAddresses\Validation\Rules;

use Axlon\PostalCodeValidation\Rules\PostalCode;

class DefaultRules
{
    /**
     * @var array
     */
    protected $rules = [];

    /**
     * DefaultRules constructor.
     */
    public function __construct()
    {
        $this->rules = [
            'name' => 'required|max:100',
            'street' => 'required|max:64',
            'house_number' => 'required|max:16',
            'house_number_extension' => 'nullable|max:16',
            'city' => 'required|max:64',
            'country_id' => 'required|exists:countries,id',
            'postal_code' =>  'required'
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
        return [
            'name.required' => __('Vul a.u.b. een voornaam in'),
            'name.max' => __('De achternaam mag maximaal :max karaters bevatten'),
            'street.required' => __('Vul a.u.b. een straatnaam in'),
            'street.max' => __('De straatnaam mag maximaal :max karaters bevatten'),
            'house_number.required' => __('Vul a.u.b. een huisnummer in'),
            'house_number.max' => __('Het huisnummer mag maximaal :max karaters bevatten'),
            'house_number_extension.max' => __('De huisnummer toevoeging mag maximaal :max karaters bevatten'),
            'postal_code.required' => __('Vul a.u.b. een postcode in'),
            'postal_code.max' => __('De postcode mag maximaal :max karaters bevatten'),
            'postal_code.regex' => __('De postcode mag alleen letters en cijfers bevatten'),
            'city.required' => __('Vul a.u.b. een plaatnaam in'),
            'city.max' => __('De plaatsnaam mag maximaal :max karaters bevatten'),
            'country_id.required' => __('Voer a.u.b. een geldig land in'),
            'country_id.exists' => __('Het door u opgegeven land bestaat niet')
        ];
    }
}
