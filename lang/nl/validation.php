<?php

return [
    "street" => [
        "required" => "Vul a.u.b. een straatnaam in",
        "max" => "De straatnaam mag maximaal :max karaters bevatten",
    ],

    "house_number" => [
        "required" => "Vul a.u.b. een huisnummer in",
        "max" => "Het huisnummer mag maximaal :max karaters bevatten",
        "extension_max" => "De huisnummer toevoeging mag maximaal :max karaters bevatten",
    ],

    "postal_code" => [
        "required" => "Vul a.u.b. een postcode in",
        "max" => "De postcode mag maximaal :max karaters bevatten",
        "regex" => "De postcode mag alleen letters en cijfers bevatten",
        "invalid" => "De opgegeven postcode is ongeldig",
    ],

    "city" => [
        "required" => "Vul a.u.b. een plaatnaam in",
        "max" => "De plaatsnaam mag maximaal :max karaters bevatten",
    ],

    "state" => [
        "required" => "Vul a.u.b. een provincie/staat in"
    ],
];
