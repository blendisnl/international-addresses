<?php
namespace BlendisNL\InternationalAddresses\Validation\Nl;

use Axlon\PostalCodeValidation\Rules\PostalCode;
use BlendisNL\InternationalAddresses\Validation\Rules\DefaultRules;

class Rules extends DefaultRules
{
    /**
     * Here you can override the default rules
     * @return array|void
     */
    public function overrideRules()
    {
        $this->rules['postal_code'] = ['required', PostalCode::forCountry('NL')];
    }
}
