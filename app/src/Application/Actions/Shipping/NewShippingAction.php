<?php
declare(strict_types=1);

namespace App\Application\Actions\Shipping;

use App\Domain\Shipping\Shipping;
use Psr\Http\Message\ResponseInterface as Response;


class NewShippingAction extends ShippingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $shipping = new Shipping(
            null,
            $this->get('product'),
            $this->get('distance'),
            $this->get('weight')
        );

        $shipping = $this->shippingRepository->persist($shipping);
        return $this->respondWithData($shipping);
    }
}
