<?php

declare(strict_types=1);

namespace App\Application\Actions\Shipping;

use App\Domain\Shipping\Shipping;
use Psr\Http\Message\ResponseInterface as Response;

class UpdateShippingAction extends ShippingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        /**
         * @var Shipping
        */
        $shipping = $this->shippingRepository->findShippingOfId(
            $this->get('id')
        );

        $shipping->setDistance($this->get('distance'));
        $shipping->setProduct($this->get('product'));
        $shipping->setWeight($this->get('weight'));

        $this->shippingRepository->persist($shipping);
        return $this->respondWithData($shipping);
    }
}
