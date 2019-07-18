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
     * @var DefaultRules
     */
    protected $rulesContainer;

    public function __construct(
        array $query = [],
        array $request = [],
        array $attributes = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        $content = null
    ) {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);

        if (!$this->countryCode) {
            $this->countryCode = $request->get('country_code', 'nl');
        }

        $rulesClass = '\BlendisNL\InternationalAddresses\Validation\Rules\\' . strtoupper($this->countryCode) . '\Rules';

        if (!class_exists($rulesClass)) {
            $rulesClass = DefaultRules::class;
        }

        $this->rulesContainer = new $rulesClass($request);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return $this->rulesContainer->getRules();
    }

    public function messages()
    {
        return $this->rulesContainer->getMessages();
    }


}
