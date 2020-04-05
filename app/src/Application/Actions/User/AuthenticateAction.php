<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Ahc\Jwt\JWT;
use App\Application\Actions\Action;
use App\Domain\User\Password;
use App\Domain\User\UserRepository;
use App\Domain\User\UserService;
use App\Domain\User\UserValidations;
use Psr\Log\LoggerInterface;
use Slim\Exception\HttpUnauthorizedException;
use Psr\Http\Message\ResponseInterface as Response;


class AuthenticateAction extends Action
{
    /**
     * @var UserRepository
     */
    protected $userRepository;
    /**
     * @var UserValidations
     */
    protected $userService;

    /**
     * @var JWT
     */
    protected $jwt;

    /**
     * @param LoggerInterface $logger
     * @param UserRepository $userRepository
     * @param JWT $jwt
     */
    public function __construct(LoggerInterface $logger, UserRepository $userRepository, UserService $userService, JWT $jwt)
    {
        parent::__construct($logger);
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->jwt = $jwt;
    }


    protected function action(): Response
    {
        $username = $this->get('username');
        $user = $this
                ->userRepository
                ->findUserOfUsername($username);

        $password = new Password($this->get('password'));

        if (!$this->userService->validate($user, $password)){
            throw new HttpUnauthorizedException($this->request);
        }

        $user->setToken(
            $this
                ->jwt
                ->encode($this->args)
        );

        return $this->respondWithData($user);
    }
}
