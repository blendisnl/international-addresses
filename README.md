# international-addresses
Laravel package for validation and formatting of international postal addresses

### Usage
```
$australianAddress = new InternationalAddress(
    'au',
    'Koala Street',
    '283',
    '3000',
    'Melbourne',
    'Australia',
    '',
    '',
    'Victoria'
);

echo ($australianAddress->getFormattedAddress());
```

#### From Laravel Model object
```
$model = InternationalAddress::createFromModelArray(Address::whereId(2)->first());
echo($model->getFormattedAddress(AddressFormattingStyle::MULTILINE_HTML));
```
