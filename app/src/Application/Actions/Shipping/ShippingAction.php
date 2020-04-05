<?php
declare(strict_types=1);

namespace App\Application\Actions\Shipping;

use App\Application\Actions\Action;
use App\Domain\Shipping\ShippingRepository;
use Psr\Log\LoggerInterface;

abstract class ShippingAction extends Action
{
    /**
     * @var ShippingRepository
     */
    protected $shippingRepository;

    /**
     * @param LoggerInterface $logger
     * @param ShippingRepository  $shippingRepository
     */
    public function __construct(LoggerInterface $logger, ShippingRepository $shippingRepository)
    {
        parent::__construct($logger);
        $this->shippingRepository = $shippingRepository;
    }
}
