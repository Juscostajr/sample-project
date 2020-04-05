<?php
declare(strict_types=1);

namespace App\Application\Actions\Shipping;

use Psr\Http\Message\ResponseInterface as Response;

class ViewShippingAction extends ShippingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $shippingId = (int) $this->resolveArg('id');
        $shipping = $this->shippingRepository->findShippingOfId($shippingId);

        $this->logger->info("Shipping of id `${shippingId}` was viewed.");

        return $this->respondWithData($shipping);
    }
}
