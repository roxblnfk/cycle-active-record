<?php

declare(strict_types=1);

namespace Cycle\AR\CycleActiveRecord;

use Cycle\ORM\EntityManager;
use Cycle\ORM\EntityManagerInterface;
use Cycle\ORM\ORMInterface;
use Psr\Container\ContainerInterface;
use RuntimeException;

class StaticOrigin
{
    private static ?ORMInterface $orm = null;
    private static ?EntityManagerInterface $em = null;
    private static ?ContainerInterface $container = null;

    public static function setContainer(ContainerInterface $container): void
    {
        self::$container = $container;
    }

    public static function setOrm(ORMInterface $orm): void
    {
        self::$orm = $orm;
    }

    public static function getOrm(): ORMInterface
    {
        self::$orm ??= self::$container?->get(ORMInterface::class);
        if (self::$orm === null) {
            throw new RuntimeException('The ORM Carrier is not configured.');
        }
        return self::$orm;
    }

    public static function getEntityManager(): EntityManager
    {
        return self::$em ??= new EntityManager(self::getOrm());
    }
}
