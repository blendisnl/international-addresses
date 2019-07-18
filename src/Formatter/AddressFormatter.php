<?php
namespace BlendisNL\InternationalAddresses\Formatter;

use BlendisNL\InternationalAddresses\InternationalAddress;
use Throwable;

class AddressFormatter
{
    /**
     * @var InternationalAddress
     */
    private $internationalAddress;

    /**
     * AddressFormatter constructor.
     * @param InternationalAddress $internationalAddress
     */
    public function __construct(InternationalAddress $internationalAddress)
    {
        $this->internationalAddress = $internationalAddress;
    }

    /**
     * @param $addressFormattingStyle
     * @param bool $returnWithPlaceholders
     * @return string
     * @throws Throwable
     */
    public function getFullFormattedAddress($addressFormattingStyle, $returnWithPlaceholders = false)
    {
        $countryCode = $this->internationalAddress->getCountryCode();
        $data = $this->internationalAddress->getAddressArray();
        $viewName = 'international-addresses::address_templates.' . $countryCode;

        // If the template for this country is not found select The Netherlands as default
        if (!view()->exists($viewName)) {
            $viewName = 'international-addresses::address_templates.nl';
        }

        $output = view($viewName, $data)->render();
        if ($addressFormattingStyle === AddressFormattingStyle::MULTILINE_HTML) {
            // Escape and then nl2br
            $output = nl2br(e($output));
        }
        if ($returnWithPlaceholders) {
            return $output;
        }
        return $this->removePlaceholders($output);
    }

    public function getFullStreet()
    {
        $address =$this->getFullFormattedAddress(AddressFormattingStyle::MULTILINE_PLAIN_TEXT, true);

        $lines = explode(PHP_EOL, $address);

        foreach ($lines as $lineNumber => $line) {
            if (strpos($line, '<!-- street -->') !== false) {
                return $this->removePlaceholders($line);
            }
        }

        return false;
    }

    private function removePlaceholders($string)
    {
        $string = preg_replace('/<!--(.|\s)*?-->/', '', $string);
        return preg_replace('/&lt;!--(.|\s)*?--&gt;/', '', $string);
    }
}
