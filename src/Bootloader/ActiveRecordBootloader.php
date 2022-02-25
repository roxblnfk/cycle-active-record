<?php

declare(strict_types=1);

namespace Cycle\AR\CycleActiveRecord\Bootloader;

use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Core\Container;
use Spiral\Config\ConfiguratorInterface;
use Cycle\AR\CycleActiveRecord\Commands;
use Cycle\AR\CycleActiveRecord\Config\ActiveRecordConfig;
use Spiral\Console\Bootloader\ConsoleBootloader;

class ActiveRecordBootloader extends Bootloader
{
    protected const BINDINGS = [];
    protected const SINGLETONS = [];
    protected const DEPENDENCIES = [
        ConsoleBootloader::class
    ];

    public function __construct(private ConfiguratorInterface $config)
    {
    }

    public function boot(Container $container, ConsoleBootloader $console): void
    {
        $this->initConfig();

        $console->addCommand(Commands\ActiveRecordCommand::class);
    }

    public function start(Container $container): void
    {
    }

    private function initConfig(): void
    {
        $this->config->setDefaults(
            ActiveRecordConfig::CONFIG,
            []
        );
    }
}
