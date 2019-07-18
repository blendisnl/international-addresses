<?php
namespace BlendisNL\InternationalAddresses\Validation\Traits;

use BlendisNL\InternationalAddresses\Validation\Rules\DefaultRules;

/**
 * Trait ValidateInternationalAddressTrait
 * @package BlendisNL\InternationalAddresses\Validation\Traits
 */
trait ValidateInternationalAddressTrait
{

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var DefaultRules $rulesContainer
     */
    protected $rulesContainer;

    /**
     * ValidateInternationalAddressTrait constructor.
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null $content
     */
    public function __construct(
        array $query = [],
        array $request = [],
        array $attributes = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        $content = null
    ) {
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