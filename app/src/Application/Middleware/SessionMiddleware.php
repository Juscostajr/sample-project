<?php
declare(strict_types=1);

namespace App\Application\Middleware;

use Ahc\Jwt\JWT;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Exception\HttpUnauthorizedException;

class SessionMiddleware implements Middleware
{
    private $jwt;

    public function __construct(JWT $jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * {@inheritdoc}
     */
    public function process(Request $request, RequestHandler $handler): Response
    {
        if($request->getUri()->getPath() != '/users/auth/') {
            $authorization = $request->getHeader('Authorization')[0];

            if (is_null($authorization)) {
                throw new HttpUnauthorizedException($request);
            }

            $this->jwt->decode($authorization);
        }
        return $handler->handle($request);
    }

}
