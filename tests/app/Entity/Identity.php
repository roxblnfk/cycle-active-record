<?php

declare(strict_types=1);

namespace Cycle\ActiveRecord\Tests\App\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use DateTimeImmutable;
use DateTimeInterface;

#[Entity(table: 'identity')]
class Identity
{
    #[Column(type: 'bigPrimary', typecast: 'int')]
    public int $id;

    #[Column(type: 'datetime')]
    public DateTimeInterface $createdAt;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }
}
