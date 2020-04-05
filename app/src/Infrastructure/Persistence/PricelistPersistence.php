<?php


namespace App\Infrastructure\Persistence;


use App\Domain\Shipping\Pricelist;
use App\Domain\Shipping\PricelistNotFoundException;
use App\Domain\Shipping\PricelistRepository;
use Doctrine\ORM\EntityManagerInterface;


class PricelistPersistence implements PricelistRepository
{

    private $em;
    private $repository;


    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repository = $this->em->getRepository(Pricelist::class);
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
    public function findPricelistOfId(int $id): Pricelist
    {
        $Pricelist = $this->repository->findOneBy(['id' => $id]);
        if (!$Pricelist) {
            throw new PricelistNotFoundException();
        }
        return $Pricelist;
    }


    public function persist(Pricelist $Pricelist)
    {
        $this->em->persist($Pricelist);
        $this->em->flush();
    }
}