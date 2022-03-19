<?php

declare(strict_types=1);

namespace Cycle\ActiveRecord\Tests\Funcitonal\Entity;

use Cycle\ActiveRecord\Tests\App\Entity\User;
use Cycle\ActiveRecord\Tests\WithDatabaseTestCase;

final class UserTest extends WithDatabaseTestCase
{
    public function testUserFindByPk(): void
    {
        $user = User::findByPK(1);
        $this->assertNotNull($user);
        $this->assertSame('Antony', $user->name);

        $user = User::findByPK(2);
        $this->assertNotNull($user);
        $this->assertSame('John', $user->name);
    }

    public function testUserFindOne(): void
    {
        $user = User::findOne(['id' => 1]);
        $this->assertNotNull($user);
        $this->assertSame('Antony', $user->name);

        $user = User::findOne(['name' => 'John']);
        $this->assertNotNull($user);
        $this->assertSame(2, $user->id);
    }

    public function testUserFindAll(): void
    {
        $users = User::findAll();
        $this->assertCount(2, $users);
    }

    public function testUserSave(): void
    {
        $user = new User('Alex');

        // save
        $this->assertTrue($user->save()->isSuccess());

        // load
        $this->assertCount(3, User::findAll());
        $result = $this->selectEntity(User::class, cleanHeap: true)->wherePK($user->id)->fetchOne();

        // check
        $this->assertSame($result->name, $user->name);
    }

    public function testDeleteUser(): void
    {
        User::findByPK(1)->delete();

        $this->assertNull(User::findByPK(1));
        $this->assertNotNull(User::findByPK(2));
    }
}
