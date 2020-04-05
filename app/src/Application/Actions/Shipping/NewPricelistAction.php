<?php
declare(strict_types=1);

namespace App\Application\Actions\Shipping;
use App\Domain\Shipping\Pricelist;
use Psr\Http\Message\ResponseInterface as Response;

class NewPricelistAction extends PricelistAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {

        $pricelist = new Pricelist(
            null,
            $this->get('company'),
            $this->get('fixedValue'),
            $this->get('kilogramsKilometersValue')
        );

        $pricelist = $this->pricelistRepository->persist($pricelist);
        return $this->respondWithData($pricelist);
    }
}
