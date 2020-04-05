<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__ . '/vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$settings = require __DIR__ . '/app/settings.php';
$settings($containerBuilder);
$dependencies = require __DIR__.'/app/dependencies.php';
$dependencies($containerBuilder);
$container = $containerBuilder->build();

$entityManager = $container->get(EntityManagerInterface::class);

return ConsoleRunner::createHelperSet($entityManager);