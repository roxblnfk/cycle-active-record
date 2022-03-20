# Cycle Active Record

[![PHP](https://img.shields.io/packagist/php-v/roxblnfk/cycle-active-record.svg?style=flat-square)](https://packagist.org/packages/roxblnfk/cycle-active-record)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/roxblnfk/cycle-active-record.svg?style=flat-square)](https://packagist.org/packages/roxblnfk/cycle-active-record)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/roxblnfk/cycle-active-record/run-tests?label=tests&style=flat-square)](https://github.com/roxblnfk/cycle-active-record/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/roxblnfk/cycle-active-record.svg?style=flat-square)](https://packagist.org/packages/roxblnfk/cycle-active-record)

ActiveRecord pattern based on Cycle ORM. AR entities work fine with mappers, repositories, behaviors and other Cycle
features.

The package just adds to entity such proxy methods like `save` and `delete` using a class inheritance.

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

## Example

Entity:
```php
use Cycle\ActiveRecord\ActiveRecord;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;

#[Entity(table: 'user')]
class User extends ActiveRecord
{
    #[Column(type: 'primary', typecast: 'int')]
    public int $id;

    public function __construct(
        #[Column(type: 'string')]
        public string $name
    ) {}
}
```

Usage:

```php
$user1 = new User('Lia');
$user2 = new User('Zaza');

// Persisting
$user1->prepare();
$user2->save(); // Save current and prepared entities

// Find and delete
User::findByPK(10)?->delete();

// Delete multiple
$user1->prepareDeletion();
$user2->delete();

// Use SelectQuery
User::find()->where('id', '>', '10')->fetchData();
```

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
