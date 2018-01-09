# Izzle, CSV

## What is "Izzle CSV"?

Izzle CSV is a highly memory efficient, flexible and extendable open-source CSV import library.

```php
use Izzle\Csv\Reader;
use Izzle\Csv\Config;
use Izzle\Csv\Interpreter;

$interpreter = (new Interpreter())->addObserver(function (array $line) {
    var_dump($line);
});

$csv = new Reader((new Config())->setDelimiter(';')->setIgnoreHeaderLine(true));
$csv->parse(__DIR__ . '/data.csv', $interpreter);
```
## Requirements

* PHP 7.0 or later

## Installation

Install composer in your project:

```bash
curl -s http://getcomposer.org/installer | php
```

Create a `composer.json` file in your project root:

```json
{
    "require": {
        "izzle/csv": "*"
    }
}
```

Install via composer:

```bash
php composer.phar install
```

## Documentation

### Configuration

Import configuration:

```php
use Izzle\Csv\Config;

$config = new Config();
$config
    ->setDelimiter("\t") // Customize delimiter. Default value is comma(,)
    ->setEnclosure("'")  // Customize enclosure. Default value is double quotation(")
    ->setEscape("\\")    // Customize escape character. Default value is backslash(\)
    ->setToCharset('UTF-8') // Customize target encoding. Default value is null, no converting.
    ->setFromCharset('SJIS-win') // Customize CSV file encoding. Default value is null.
;
```