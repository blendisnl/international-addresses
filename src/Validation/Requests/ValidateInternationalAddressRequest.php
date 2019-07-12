<?php
namespace BlendisNL\InternationalAddresses\Validation\Requests;

use BlendisNL\InternationalAddresses\Validation\Rules\DefaultRules;
use Illuminate\Foundation\Http\FormRequest;

class ValidateInternationalAddressRequest extends FormRequest
{
    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @return array
     */
    public function rules(): array
    {
        $this->countryCode = $this->request->get('country_code', 'nl');
        $rulesClass = '\BlendisNL\InternationalAddresses\Validation\\' . ucfirst($this->countryCode) . '\Rules';


        /** @var DefaultRules $rulesObject */
        $rulesObject = new $rulesClass($this->request);
        return $rulesObject->getRules();
    }
}
