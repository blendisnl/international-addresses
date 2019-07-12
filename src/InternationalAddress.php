<?php
namespace BlendisNL\InternationalAddresses;

use BlendisNL\InternationalAddresses\Formatter\AddressFormatter;
use BlendisNL\InternationalAddresses\Formatter\AddressFormattingStyle;
use ReflectionClass;
use BlendisNL\InternationalAddresses\InternationalAddress;

class InternationalAddress
{
    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $houseNumber;

    /**
     * Only necessary in some countries
     * @var string
     */
    private $houseNumberExtension;

    /**
     * @var string
     */
    private $extraAddressLine;

    /**
     * Postalcode, zip code
     * @var string
     */
    private $postalCode;

    /**
     * City, town
     * @var string
     */
    private $city;

    /**
     * Province or state
     * @var string
     */
    private $province;

    /**
     * @var string
     */
    private $country;

    /**
     * Country's ISO 3166 Alpha-2 code
     * @var string
     */
    private $countryCode;

    public const ACCEPTED_FIELD_NAMES = [
        'country_code',
        'street',
        'house_number',
        'postal_code',
        'city',
        'country_name',
        'extra_address_line',
        'house_number_extension',
        'province',
    ];

    /**
     * InternationalAddress constructor.
     * @param $countryCode
     * @param $street
     * @param $houseNumber
     * @param $postalCode
     * @param $city
     * @param $country
     * @param null $extraAddressLine
     * @param null $houseNumberExtension
     * @param null $province
     */
    public function __construct(
        $countryCode,
        $street,
        $houseNumber,
        $postalCode,
        $city,
        $country,
        $extraAddressLine = null,
        $houseNumberExtension = null,
        $province = null
    ) {
        $this->countryCode = $countryCode;
        $this->street = $street;
        $this->houseNumber = $houseNumber;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->country = $country;
        $this->houseNumberExtension = $houseNumberExtension;
        $this->province = $province;
        $this->extraAddressLine = $extraAddressLine;
    }

    /**
     * @return array
     */
    public function getAddressArray()
    {
        return [
            'street'                =>  $this->street,
            'houseNumber'           =>  $this->houseNumber,
            'postalCode'            =>  $this->postalCode,
            'city'                  =>  $this->city,
            'country'               =>  $this->country,
            'houseNumberExtension'  =>  $this->houseNumberExtension,
            'province'              =>  $this->province,
            'extraAddressLine'      =>  $this->extraAddressLine,
        ];
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function getFormattedAddress($addressFormattingStyle)
    {
        $formatter = new AddressFormatter($this);
        return $formatter->getFullFormattedAddress($addressFormattingStyle);
    }

    public function getFullStreet()
    {
        $formatter = new AddressFormatter($this);
        return $formatter->getFullStreet();
    }

    /**
     * @param $model
     * @return InternationalAddress
     * @throws \ReflectionException
     */
    public static function createFromModelArray($model): InternationalAddress
    {
        $params = [];
        foreach (self::ACCEPTED_FIELD_NAMES as $field_name) {
            $params[] = $model->$field_name;
        }
        $reflector = new ReflectionClass(__CLASS__);
        return $reflector->newInstanceArgs($params);
    }

}
