<?php
namespace App\Domain\Shipping;

class FreightService
{
    public function calculate (Shipping $shipping, Pricelist $pricelist){
        $freigth =
            $pricelist->getFixedValue() +
            (
                $shipping->getWeight() *
                $shipping->getDistance() *
                $pricelist->getKilogramsKilometersValue()
            );
        $pricelist->setFreight($freigth);
        return $pricelist;
    }

    public function asc(array $freigthList) {
        $x = $freigthList;
        usort($x,
            function($a, $b) {
            return $a->getFreight() > $b->getFreight() ? 1 : 0;
        });
        return $x;
    }

}