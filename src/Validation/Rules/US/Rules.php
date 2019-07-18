<?php
namespace BlendisNL\InternationalAddresses\Validation\Rules\US;

use Axlon\PostalCodeValidation\Rules\PostalCode;
use BlendisNL\InternationalAddresses\Validation\Rules\DefaultRules;

class Rules extends DefaultRules
{
    /**
     * Here you can override the default rules
     * @return void
     */
    public function overrideRules()
    {
        $this->rules['postal_code'] = ['required', PostalCode::forCountry('US')];
        $this->rules['province'] = 'required';
    }

    /**
     * Here you can override the default messages
     * @return void
     */
    public function overrideMessages()
    {
        $this->messages['postal_code.postal_code'] = __('De opgegeven postcode is ongeldig');
        $this->messages['province.required'] = __('Vul a.u.b. een provincie/staat in');
    }
}
