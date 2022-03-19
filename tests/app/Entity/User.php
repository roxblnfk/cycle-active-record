<?php

declare(strict_types=1);

namespace Cycle\ActiveRecord\Tests\App\Entity;

use Cycle\ActiveRecord\Model;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(table: 'user')]
class User extends Model
{
    #[Column(type: 'bigInteger', primary: true, typecast: 'int')]
    public int $id;

    #[Column(type: 'string', nullable: false)]
    public string $name;

    #[BelongsTo(target: Identity::class, innerKey: 'id', outerKey: 'id', load: 'eager', cascade: true)]
    public Identity $identity;

    public function __construct(string $name, ?Identity $identity = null)
    {
        $this->identity = $identity ?? new Identity();
    }
}
