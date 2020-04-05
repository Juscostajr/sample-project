<?php
declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Domain\User\UserService;
use App\Domain\User\UserValidations;
use App\Infrastructure\Persistence\UserPersistence;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(UserPersistence::class),
        UserService::class => \DI\autowire(UserValidations::class),
    ]);
};
