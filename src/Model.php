<?php

declare(strict_types=1);

namespace Cycle\ActiveRecord;

use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\RepositoryInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Transaction\StateInterface;

abstract class Model
{
    final public static function findOne(array $scope): ?static
    {
        return self::getRepository()->findOne($scope);
    }

    final public static function findByPK(mixed $pk): ?static
    {
        return self::getRepository()->findByPK($pk);
    }

    final public static function findAll(array $scope = []): iterable
    {
        return self::getRepository()->findAll($scope);
    }

    /**
     * @return Select<static>
     */
    final public static function find(): Select
    {
        return new Select(self::getOrm(), __CLASS__);
    }

    final public function save(bool $cascade = true): StateInterface
    {
        $em = StaticOrigin::getEntityManager();
        $em->persist($this, $cascade);
        return $em->run(throwException: false);
    }

    final public function delete(bool $cascade = true): StateInterface
    {
        return StaticOrigin::getEntityManager()
            ->delete($this, $cascade)
            ->run(throwException: false);
    }

    final public function prepare(bool $cascade = true): EntityManager
    {
        return StaticOrigin::getEntityManager()->persist($this, $cascade);
    }

    final public function prepareDeletion(bool $cascade = true): EntityManager
    {
        return StaticOrigin::getEntityManager()->delete($this, $cascade);
    }

    private static function getOrm(): ORMInterface
    {
        return StaticOrigin::getOrm();
    }

    /**
     * @return RepositoryInterface<static>
     */
    private static function getRepository(): RepositoryInterface
    {
        return self::getOrm()->getRepository(static::class);
    }
}
