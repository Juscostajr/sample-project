<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\User\Password;
use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserPersistence implements UserRepository
{
    /**
     * @var User[]
     */

    private $em;
    private $repository;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $users
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repository = $this->em->getRepository(User::class);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): User
    {
        $user = $this->repository->findOneBy(['id' => $id]);
        if (!$user) {
            throw new UserNotFoundException();
        }
        return $user;
    }

    public function findUserOfUsername(string $username): User
    {
        /**
         * @var User
         */
        $user = $this->repository->findOneBy(['username' => $username]);
        if (!$username) {
            throw new UserNotFoundException();
        }
        return $user;
    }


    public function persist(User $user)
    {
        $this->em->persist($user);
        $this->em->flush();
    }

}
