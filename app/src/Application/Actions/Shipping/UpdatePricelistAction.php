<?php

declare(strict_types=1);

namespace App\Application\Actions\Shipping;

use App\Application\Actions\Shipping\PricelistAction;
use App\Domain\Shipping\Pricelist;
use Psr\Http\Message\ResponseInterface as Response;

class UpdatePricelistAction extends PricelistAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {

        /**
         * @var Pricelist
         */
        $pricelist = $this->pricelistRepository->findPricelistOfId(
            $this->get('id')
        );

        $pricelist->setCompany($this->get('company'));
        $pricelist->setFixedValue($this->get('fixedValue'));
        $pricelist->setKilogramsKilometersValue($this->get('kilogramsKilometersValue'));

        $this->pricelistRepository->persist($pricelist);
        return $this->respondWithData($pricelist);
    }
}
