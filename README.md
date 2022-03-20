# This is my package cycle-active-record

[![PHP](https://img.shields.io/packagist/php-v/roxblnfk/cycle-active-record.svg?style=flat-square)](https://packagist.org/packages/roxblnfk/cycle-active-record)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/roxblnfk/cycle-active-record.svg?style=flat-square)](https://packagist.org/packages/roxblnfk/cycle-active-record)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/roxblnfk/cycle-active-record/run-tests?label=tests&style=flat-square)](https://github.com/roxblnfk/cycle-active-record/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/roxblnfk/cycle-active-record.svg?style=flat-square)](https://packagist.org/packages/roxblnfk/cycle-active-record)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Requirements

Make sure that your server is configured with following PHP version and extensions:

- PHP 8.0+
- Spiral framework 2.10+

## Installation

You can install the package via composer:

```bash
composer require roxblnfk/cycle-active-record
```

After package install you need to register bootloader from the package.

```php
protected const LOAD = [
    // ...
    \Cycle\ActiveRecord\Boot\CycleActiveRecordBootloader::class,
];
```

> Note: if you are using [`spiral-packages/discoverer`](https://github.com/spiral-packages/discoverer),
> you don't need to register bootloader by yourself.

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
