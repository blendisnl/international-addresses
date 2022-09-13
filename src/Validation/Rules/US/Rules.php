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
        $this->rules['province'] = ['required'];
    }

    /**
     * Here you can override the default messages
     * @return void
     */
    public function overrideMessages()
    {
        $this->messages['postal_code.postal_code'] = __('international-addresses::validation.postal_code.invalid');
        $this->messages['province.required'] = __('international-addresses::validation.state.required');
    }
}
