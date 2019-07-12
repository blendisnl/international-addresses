<!-- street -->{{ $houseNumber }} {{ $street }}
@if ($extraAddressLine)
    {{ $extraAddressLine }}
@endif
{{ $city }}, {{ $province }} {{ $postalCode }}
{{ $country }}
