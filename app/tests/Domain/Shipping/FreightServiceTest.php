<?php

use App\Domain\Shipping\FreightService;
use App\Domain\Shipping\Pricelist;
use App\Domain\Shipping\Shipping;
use PHPUnit\Framework\TestCase;

class FreightServiceTest extends TestCase
{
    public function testFreightCalc()
    {
        $pricelist = [
            new Pricelist(1, 'BoaDex', 10.00, 0.05),
            new Pricelist(2, 'BoaLog', 4.30, 0.12),
            new Pricelist(3, 'Transboa (até 5kg)', 2.1, 1.1)
        ];

        $shipping = [
            new Shipping(1, 'Fone de Ouvido', 65, 1 ),
            new Shipping(2, 'Controle Xbox', 1, 3 ),
            new Shipping(3, 'Pc Gamer', 1, 35 ),
            new Shipping(4, 'Fone de Ouvido',430,1 )
        ];

        $freightService = new FreightService();

        $this->assertEquals(13.25,$freightService->calculate($shipping[0],$pricelist[0])->getFreight());

        $freightList = array();
        foreach ($pricelist as $item) {
            array_push($freightList, $freightService->calculate($shipping[0], $item));
        }

        $orderedList = $freightService->asc($freightList);
        $this->assertEquals(true,$orderedList[0]->getFreight() < $orderedList[1]->getFreight());
        $this->assertEquals(true,$orderedList[1]->getFreight() < $orderedList[2]->getFreight());
        $this->assertEquals(false,$orderedList[2]->getFreight() < $orderedList[1]->getFreight());

    }

}
