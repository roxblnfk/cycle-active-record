<?php

declare(strict_types=1);

namespace Cycle\AR\CycleActiveRecord\Config;

use Spiral\Core\InjectableConfig;

final class ActiveRecordConfig extends InjectableConfig
{
    public const CONFIG = 'cycle-active-record';
    protected $config = [];
}
