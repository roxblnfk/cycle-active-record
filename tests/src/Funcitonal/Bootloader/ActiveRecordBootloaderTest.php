<?php

declare(strict_types=1);

namespace Cycle\AR\CycleActiveRecord\Tests\Funcitonal\Bootloader;

use Cycle\AR\CycleActiveRecord\StaticOrigin;
use Cycle\AR\CycleActiveRecord\Tests\TestCase;
use Cycle\ORM\ORMInterface;

final class ActiveRecordBootloaderTest extends TestCase
{
    public function testStaticOriginSettings(): void
    {
        $this->assertTrue($this->getContainer()->has(ORMInterface::class));
        $this->assertInstanceOf(ORMInterface::class, StaticOrigin::getOrm());
    }
}
