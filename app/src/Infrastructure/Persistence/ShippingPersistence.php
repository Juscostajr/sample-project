<?php


namespace App\Infrastructure\Persistence;


use App\Domain\Shipping\Shipping;
use App\Domain\Shipping\ShippingNotFoundException;
use App\Domain\Shipping\ShippingRepository;
use Doctrine\ORM\EntityManagerInterface;


class ShippingPersistence implements ShippingRepository
{

    private $em;
    private $repository;


    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repository = $this->em->getRepository(Shipping::class);
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
    public function findShippingOfId(int $id): Shipping
    {
        $Shipping = $this->repository->findOneBy(['id' => $id]);
        if (!$Shipping) {
            throw new ShippingNotFoundException();
        }
        return $Shipping;
    }


    public function persist(Shipping $Shipping)
    {
        $this->em->persist($Shipping);
        $this->em->flush();
    }
}