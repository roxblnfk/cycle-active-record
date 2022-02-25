<?php

declare(strict_types=1);

namespace Cycle\AR\CycleActiveRecord\Commands;

use Spiral\Console\Command;

class ActiveRecordCommand extends Command
{
    protected const NAME = 'cycle-active-record';
    protected const DESCRIPTION = 'My command';
    protected const ARGUMENTS = [];

    public function perform(): int
    {
        return self::SUCCESS;
    }
}
