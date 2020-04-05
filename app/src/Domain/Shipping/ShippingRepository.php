<?php
declare(strict_types=1);

namespace App\Domain\Shipping;


interface ShippingRepository
{
    /**
     * @return Shipping[]
     */
    public function findAll(): array;


    public function findShippingOfId(int $id): Shipping;
}
