<?php
declare(strict_types=1);

namespace App\Domain\Shipping;

use App\Domain\DomainException\DomainRecordNotFoundException;

class PricelistNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The pricelist you requested does not exist.';
}
