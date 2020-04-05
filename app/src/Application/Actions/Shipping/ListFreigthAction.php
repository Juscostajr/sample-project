<?php

namespace App\Application\Actions\Shipping;

use App\Application\Actions\Action;
use App\Application\Actions\Shipping\PricelistAction;
use App\Domain\Shipping\FreightService;
use App\Domain\Shipping\PricelistRepository;
use App\Domain\Shipping\ShippingRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class ListFreigthAction extends Action
{

    /**
     * @var PricelistRepository
     */
    protected $pricelistRepository;
    protected $shippingRepository;

    /**
     * @param LoggerInterface $logger
     * @param PricelistRepository  $pricelistRepository
     */
    public function __construct(LoggerInterface $logger, PricelistRepository $pricelistRepository, ShippingRepository $shippingRepository)
    {
        parent::__construct($logger);
        $this->pricelistRepository = $pricelistRepository;
        $this->shippingRepository = $shippingRepository;
    }


    protected function action(): Response
    {
        $shipping = $this->shippingRepository->findShippingOfId($this->resolveArg('id'));
        $pricelist = $this->pricelistRepository->findAll();
        $this->logger->info("Pricelists list was viewed.");

        $freightService = new FreightService();

        $pricelistWithFreigth = array();
        foreach ($pricelist as $item) {
            array_push($pricelistWithFreigth, $freightService->calculate($shipping, $item));
        }

        return $this->respondWithData($freightService->asc($pricelistWithFreigth));
    }
}