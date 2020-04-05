<?php
declare(strict_types=1);

namespace App\Domain\Shipping;

use App\Domain\DomainException\DomainRecordNotFoundException;

class ShippingNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The shipping you requested does not exist.';
}
