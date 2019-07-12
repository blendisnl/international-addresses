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
     * @return string
     * @throws Throwable
     */
    public function getFormattedAddress($addressFormattingStyle)
    {
        $countryCode = $this->internationalAddress->getCountryCode();
        $data = $this->internationalAddress->getAddressArray();

        $plainText = view('international-addresses::address_templates.' . $countryCode, $data)->render();

        if ($addressFormattingStyle === AddressFormattingStyle::MULTILINE_HTML) {
            return nl2br($plainText);
        }
        return $plainText;
    }
}
