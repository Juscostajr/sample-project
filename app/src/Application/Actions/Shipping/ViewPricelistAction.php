<?php
declare(strict_types=1);

namespace App\Application\Actions\Shipping;

use App\Application\Actions\Shipping\PricelistAction;
use Psr\Http\Message\ResponseInterface as Response;

class ViewPricelistAction extends PricelistAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $pricelistId = (int) $this->resolveArg('id');
        $pricelist = $this->pricelistRepository->findPricelistOfId($pricelistId);

        $this->logger->info("Pricelist of id `${pricelistId}` was viewed.");

        return $this->respondWithData($pricelist);
    }
}
