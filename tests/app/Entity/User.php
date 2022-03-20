<?php

declare(strict_types=1);

namespace Cycle\ActiveRecord\Tests\App\Entity;

use Cycle\ActiveRecord\ActiveRecord;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(table: 'user')]
class User extends ActiveRecord
{
    #[Column(type: 'bigInteger', primary: true, typecast: 'int')]
    public int $id;

    #[Column(type: 'string')]
    public string $name;

    #[BelongsTo(target: Identity::class, innerKey: 'id', outerKey: 'id', load: 'eager', cascade: true)]
    public Identity $identity;

    public function __construct(string $name, ?Identity $identity = null)
    {
        $this->name = $name;
        $this->identity = $identity ?? new Identity();
    }
}
