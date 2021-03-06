<?php
declare(strict_types=1);

use Ahc\Jwt\JWT;
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        JWT::class => function(ContainerInterface $c): JWT {
            return new JWT($c->get('settings')['jwt_key']);
        },
        EntityManagerInterface::class => function (ContainerInterface $c): EntityManager {
            $doctrineSettings = $c->get('settings')['doctrine'];

            $config = Setup::createAnnotationMetadataConfiguration(
                $doctrineSettings['metadata_dirs'],
                $doctrineSettings['dev_mode'],
                $doctrineSettings['cache_dir'],
                null,
                false
            );

            return EntityManager::create($doctrineSettings['connection'], $config);
        },
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get('settings');

            $loggerSettings = $settings['logger'];
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
    ]);
};
