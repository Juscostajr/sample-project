<?php
declare(strict_types=1);

use App\Domain\Shipping\PricelistRepository;
use App\Domain\Shipping\ShippingRepository;
use App\Domain\User\UserRepository;
use App\Domain\User\UserService;
use App\Domain\User\UserValidations;
use App\Infrastructure\Persistence\PricelistPersistence;
use App\Infrastructure\Persistence\ShippingPersistence;
use App\Infrastructure\Persistence\UserPersistence;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(UserPersistence::class),
        ShippingRepository::class => \DI\autowire(ShippingPersistence::class),
        PricelistRepository::class => \DI\autowire(PricelistPersistence::class),
        UserService::class => \DI\autowire(UserValidations::class),
    ]);
};
