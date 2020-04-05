<?php
declare(strict_types=1);

namespace App\Domain\Shipping;


interface PricelistRepository
{
    /**
     * @return Pricelist[]
     */
    public function findAll(): array;


    public function findPricelistOfId(int $id): Pricelist;

    public function persist(Pricelist $pricelist);
}
