<?php

namespace Cycle\AR\CycleActiveRecord\Tests;

use Cycle\AR\CycleActiveRecord\Bootloader\ActiveRecordBootloader;
use Spiral\Boot\Bootloader\ConfigurationBootloader;

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
            ActiveRecordBootloader::class,
        ];
    }
}
