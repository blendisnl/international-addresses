<?php

return [
    "street" => [
        "required" => "Enter a street name",
        "max" => "Street name can contain max :max characters",
    ],

    "house_number" => [
        "required" => "Enter a house number",
        "max" => "House number can contain max :max characters",
        "extension_max" => "The extension may contain max :max characters",
    ],

    "postal_code" => [
        "required" => "Enter a postal code",
        "max" => "Postal code can contain max :max characters",
        "regex" => "Postcode can only contain letters and numbers",
        "invalid" => "Postcode is invalid",
    ],

    "city" => [
        "required" => "Enter a city",
        "max" => "De plaatsnaam mag maximaal :max karaters bevatten",
    ],

    "state" => [
        "required" => "Enter a valid state"
    ],
];
