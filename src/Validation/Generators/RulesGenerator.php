<?php
namespace BlendisNL\InternationalAddresses\Validation\Generators;


use BlendisNL\InternationalAddresses\Validation\Rules\DefaultRules;

class RulesGenerator
{
    /**
     * @var DefaultRules $rulesContainer
     */
    private $rulesContainer;

    public function __construct($countryCode)
    {
        $rulesClass = '\BlendisNL\InternationalAddresses\Validation\Rules\\' . strtoupper($countryCode) . '\Rules';

        if (!class_exists($rulesClass)) {
            $rulesClass = DefaultRules::class;
        }

        $this->rulesContainer = new $rulesClass();
    }

    /**
     * @param bool $key
     * @return array
     */
    public function getRules($key = false)
    {
        $allRules = $this->rulesContainer->getRules();
        if ($key) {
            return $allRules[$key];
        }
        return $allRules;
    }

    /**
     * @param bool $key
     * @return array|bool
     */
    public function getMessages($key = false)
    {
        $allMessages = $this->rulesContainer->getMessages();
        if ($key) {
            return $allMessages[$key] ?? false;
        }
        return $allMessages;
    }
}