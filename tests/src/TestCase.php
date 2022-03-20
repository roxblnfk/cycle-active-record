<?php

namespace Cycle\ActiveRecord\Tests;

use Cycle\ActiveRecord\Boot\CycleActiveRecordBootloader;
use Cycle\ActiveRecord\Tests\App\Boot\AppBootloader;
use Spiral\Boot\Bootloader\ConfigurationBootloader;
use Spiral\Monolog\Bootloader\MonologBootloader;

class TestCase extends \Spiral\Testing\TestCase
{
    public function rootDirectory(): string
    {
        return __DIR__ . '/../';
    }

    public function defineBootloaders(): array
    {
        return [
            ConfigurationBootloader::class,
            CycleActiveRecordBootloader::class,
            AppBootloader::class,
            MonologBootloader::class,
        ];
    }
}
