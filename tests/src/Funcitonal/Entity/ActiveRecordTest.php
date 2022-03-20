<?php

declare(strict_types=1);

namespace Cycle\ActiveRecord\Tests\Funcitonal\Entity;

use Cycle\ActiveRecord\Tests\App\Entity\User;
use Cycle\ActiveRecord\Tests\WithDatabaseTestCase;

/**
 * @runTestsInSeparateProcesses
 */
final class ActiveRecordTest extends WithDatabaseTestCase
{
    public function testEntityFindByPk(): void
    {
        $user = User::findByPK(1);
        $this->assertNotNull($user);
        $this->assertSame('Antony', $user->name);

        $user = User::findByPK(2);
        $this->assertNotNull($user);
        $this->assertSame('John', $user->name);
    }

    public function testEntityFindOne(): void
    {
        $user = User::findOne(['id' => 1]);
        $this->assertNotNull($user);
        $this->assertSame('Antony', $user->name);

        $user = User::findOne(['name' => 'John']);
        $this->assertNotNull($user);
        $this->assertSame(2, $user->id);
    }

    public function testEntityFindAll(): void
    {
        $users = User::findAll();
        $this->assertCount(2, $users);
    }

    public function testEntitySave(): void
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

    public function testPrepareAndRun(): void
    {
        $user = new User('Foo');

        // save
        $user->prepare()->run();

        // load
        $this->assertCount(3, User::findAll());
        $result = $this->selectEntity(User::class, cleanHeap: true)->wherePK($user->id)->fetchOne();

        // check
        $this->assertSame($result->name, $user->name);
    }

    public function testPrepareAndSave(): void
    {
        $user1 = new User('Foo');
        $user2 = new User('Bar');

        // save
        $user1->prepare();
        $user2->save();

        // load
        $this->assertCount(4, User::findAll());
        $res = $this->selectEntity(User::class, cleanHeap: true)->wherePK($user1->id, $user2->id)->fetchAll();

        // check
        $this->assertSame($res[0]->name, 'Foo');
        $this->assertSame($res[1]->name, 'Bar');
    }

    public function testDelete(): void
    {
        $user = new User('Foo');
        $user->save();
        $id = $user->id;
        $this->assertCount(3, User::findAll());

        $user->delete();

        // check
        $this->assertCount(2, User::findAll());
        $this->assertNull(
            $this->selectEntity(User::class, cleanHeap: true)->wherePK($id)->fetchOne()
        );
    }

    // public function testDeleteAll(): void
    // {
    //     $user1 = new User('Foo');
    //     $user2 = new User('Bar');
    //     $user3 = new User('Baz');
    //     $user1->prepare()->persist($user2)->persist($user3)->run();
    //     $this->assertCount(3, User::findAll());
    //
    //     User::deleteAll();
    //
    //     // check
    //     $this->assertCount(0, User::findAll());
    // }

    public function testDeleteEntity(): void
    {
        User::findByPK(1)->delete();

        $this->assertNull(User::findByPK(1));
        $this->assertNotNull(User::findByPK(2));
    }
}
