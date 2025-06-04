# Number formatter
Simple number formatter (Formatador simples de número)

This component have two features:
- format: to formatter int or float number with thousands separator. Return object with two parameters
- formatShort: equal to `formart`, bat in short format
- byte: to formate int or float number in bit multple. Retorn one string

## Require
Necessary PHP 8.0 or more (Necessário PHP 8.0 ou superior)

## Install
composer require ngomafortuna/number-formatter

## Syntax and mode of use
```php
$number = new NumberFormatter;

var_dump($number->byte(1000000));
```

## Example
```php
use Ngomafortuna\NumberFormatter\NumberFormatter;

$value = 12000000;

$number = new NumberFormatter;

var_dump($number->format($value));
var_dump($number->formatShort($value));
var_dump($number->byte($value));
```

Results
```shell
class stdClass#2 (2) {
  public $short =>
  string(13) "+ 1 trilhões"
  public $full =>
  string(18) "10.000.000.000.000"
}

class stdClass#2 (2) {
  public $short =>
  string(3) "+1T"
  public $full =>
  string(18) "10.000.000.000.000"
}

string(4) "9 TB"
```
