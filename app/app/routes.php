<?php
declare(strict_types=1);

use App\Application\Actions\OptionPrefligth;
use App\Application\Actions\Shipping\ListFreigthAction;
use App\Application\Actions\Shipping\ListPricelistAction;
use App\Application\Actions\Shipping\NewPricelistAction;
use App\Application\Actions\Shipping\UpdatePricelistAction;
use App\Application\Actions\Shipping\ViewPricelistAction;
use App\Application\Actions\Shipping\ListShippingAction;
use App\Application\Actions\Shipping\NewShippingAction;
use App\Application\Actions\Shipping\UpdateShippingAction;
use App\Application\Actions\Shipping\ViewShippingAction;
use App\Application\Actions\User\AuthenticateAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\NewUserAction;
use App\Application\Actions\User\UpdateUserAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->options('', OptionPrefligth::class);
        $group->get('/{id}', ViewUserAction::class);
        $group->options('/{id}', OptionPrefligth::class);
        $group->post('/auth/', AuthenticateAction::class);
        $group->options('/auth/', OptionPrefligth::class);
        $group->post('/new/', NewUserAction::class);
        $group->options('/new/', OptionPrefligth::class);
        $group->put('/update/', UpdateUserAction::class);
        $group->options('/update/', OptionPrefligth::class);

    });


    $app->group('/shipping', function (Group $group) {
        $group->get('', ListShippingAction::class);
        $group->options('', ListShippingAction::class);
        $group->get('/{id}', ViewShippingAction::class);
        $group->options('/{id}', ViewShippingAction::class);
        $group->post('/new/', NewShippingAction::class);
        $group->options('/new/', OptionPrefligth::class);
        $group->put('/update/', UpdateShippingAction::class);
        $group->options('/update/', UpdateShippingAction::class);
    });

    $app->group('/pricelist', function (Group $group) {
        $group->get('', ListPricelistAction::class);
        $group->options('', OptionPrefligth::class);
        $group->get('/freight/{id}', ListFreigthAction::class);
        $group->options('/freight/{id}', OptionPrefligth::class);
        $group->get('/{id}', ViewPricelistAction::class);
        $group->options('/{id}', OptionPrefligth::class);
        $group->post('/new/', NewPricelistAction::class);
        $group->options('/new/', OptionPrefligth::class);
        $group->put('/update/', UpdatePricelistAction::class);
        $group->options('/update/', OptionPrefligth::class);
    });



};
