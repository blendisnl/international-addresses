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

    public function getRules()
    {
        return $this->rulesContainer->getRules();
    }

    public function getMessages()
    {
        return $this->rulesContainer->getMessages();
    }
}