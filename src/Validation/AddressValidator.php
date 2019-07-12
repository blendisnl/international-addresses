<?php
namespace BlendisNL\InternationalAddresses\Validation;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AddressValidator extends Rule implements AddressValidatorInterface
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var string
     */
    protected $countryCode;

    protected $concreteValidator;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return mixed|void
     */
    public function passes($attribute, $value)
    {
        $this->countryCode = $this->request->input('country_code', 'nl');
        $validatorClass = '\BlendisNL\InternationalAddresses\Validation\\' . ucfirst($this->countryCode) . '\ConcreteAddressValidator';
        $this->concreteValidator = Validator::make([$attribute => $value], [$attribute => new $validatorClass($this->request)]);
        return $this->concreteValidator->passes();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->concreteValidator->message();
    }
}
