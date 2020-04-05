<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Domain\User\Password;
use App\Domain\User\User;
use Psr\Http\Message\ResponseInterface as Response;

class NewUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $user = new User(
            null,
            $this->get('username'),
            $this->get('firstname'),
            $this->get('lastname'),
            new Password($this->get('password'))
        );

        $user = $this->userRepository->persist($user);
        return $this->respondWithData($user);
    }
}
