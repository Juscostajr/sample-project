<?php
declare(strict_types=1);

namespace App\Application\Actions\Shipping;

use App\Application\Actions\Action;
use App\Domain\Shipping\PricelistRepository;
use Psr\Log\LoggerInterface;

abstract class PricelistAction extends Action
{
    /**
     * @var PricelistRepository
     */
    protected $pricelistRepository;

    /**
     * @param LoggerInterface $logger
     * @param PricelistRepository  $pricelistRepository
     */
    public function __construct(LoggerInterface $logger, PricelistRepository $pricelistRepository)
    {
        parent::__construct($logger);
        $this->pricelistRepository = $pricelistRepository;
    }
}
