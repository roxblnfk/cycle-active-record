<?php

declare(strict_types=1);

namespace Cycle\ActiveRecord\Tests\Funcitonal\Bootloader;

use Cycle\ActiveRecord\StaticOrigin;
use Cycle\ActiveRecord\Tests\TestCase;
use Cycle\ORM\ORMInterface;

final class ActiveRecordBootloaderTest extends TestCase
{
    public function testStaticOriginSettings(): void
    {
        $this->assertTrue($this->getContainer()->has(ORMInterface::class));
        $this->assertInstanceOf(ORMInterface::class, StaticOrigin::getOrm());
    }
}
