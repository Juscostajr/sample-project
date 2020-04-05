<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
            'jwt_key' => 'a7b2d52bbb6a326cf500099de9728add39590cb0c88c94894143281c10efc7d9',
            'doctrine' => [
                'dev_mode' => true,
                'cache_dir' => __DIR__.'/../var/cache/doctrine',
                'metadata_dirs' => [__DIR__.'/../src/Domain/User', __DIR__.'/../src/Domain/Shipping'],
                'connection' => [
                    'driver' => 'pdo_mysql',
                    'host' => 'c-db-shipping',
                    'port' => 3306,
                    'dbname' => 'shipping',
                    'user' => 'root',
                    'password' => 'root',
                ]
            ]
        ],
    ]);
};
