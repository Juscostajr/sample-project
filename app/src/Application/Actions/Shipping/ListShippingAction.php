<?php
declare(strict_types=1);

namespace App\Application\Actions\Shipping;

use Psr\Http\Message\ResponseInterface as Response;

class ListShippingAction extends ShippingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $shippings = $this->shippingRepository->findAll();

        $this->logger->info("Shippings list was viewed.");

        return $this->respondWithData($shippings);
    }
}
