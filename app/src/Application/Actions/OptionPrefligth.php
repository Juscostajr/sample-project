<?php

namespace App\Application\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as ServerRequest;

final class OptionPrefligth
{
    public function __invoke(ServerRequest $request, Response $response): Response
    {
        return $response;
    }
}