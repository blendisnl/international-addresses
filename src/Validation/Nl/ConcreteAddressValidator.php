<?php
namespace BlendisNL\InternationalAddresses\Validation\Nl;

use BlendisNL\InternationalAddresses\Validation\AddressValidatorInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Sabberworm\CSS\Rule\Rule;

/**
 * Class ConcreteAddressValidator
 * @package BlendisNL\InternationalAddresses\Validation\Nl
 */
class ConcreteAddressValidator extends Rule implements AddressValidatorInterface
{
    /**
     * @var Request
     */
    protected $request;

    private $rules = [];

    /**
     * @var \Illuminate\Validation\Validator
     */
    private $validator;

    /**
     * AddressValidatorInterface constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function passes($attribute, $value)
    {
        $specificRules = new Rules('nl');
        $this->rules = $specificRules->getRules();

        $this->validator = Validator::make($this->request->all(), $this->rules,'d');

        return $this->validator->passes();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->validator->messages()->first();
    }
}
