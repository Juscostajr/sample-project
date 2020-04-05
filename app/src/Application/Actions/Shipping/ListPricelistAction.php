<?php
declare(strict_types=1);

namespace App\Application\Actions\Shipping;

use App\Application\Actions\Shipping\PricelistAction;
use Psr\Http\Message\ResponseInterface as Response;

class ListPricelistAction extends PricelistAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $shippings = $this->pricelistRepository->findAll();

        $this->logger->info("Pricelists list was viewed.");

        return $this->respondWithData($shippings);
    }
}
