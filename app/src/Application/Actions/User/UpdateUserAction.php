<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Domain\User\Password;
use App\Domain\User\User;
use Psr\Http\Message\ResponseInterface as Response;

class UpdateUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        /**
         * @var User
        */
        $user = $this->userRepository->findUserOfUsername(
            $this->get('username')
        );

        $user->setFirstName($this->get('firstname'));
        $user->setLastName($this->get('lastname'));
        $user->setPassword(new Password($this->get('password')));

        $this->userRepository->persist($user);
        return $this->respondWithData($user);
    }
}
