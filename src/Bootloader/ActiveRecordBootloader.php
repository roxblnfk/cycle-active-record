<?php

declare(strict_types=1);

namespace Cycle\AR\CycleActiveRecord\Bootloader;

use Cycle\AR\CycleActiveRecord\StaticOrigin;
use Psr\Container\ContainerInterface;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Cycle\Bootloader\CycleOrmBootloader;

class ActiveRecordBootloader extends Bootloader
{
    protected const BINDINGS = [];
    protected const SINGLETONS = [];
    protected const DEPENDENCIES = [
        CycleOrmBootloader::class,
    ];

    public function start(ContainerInterface $container): void
    {
        StaticOrigin::setContainer($container);
    }
}
