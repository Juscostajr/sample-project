<?php
namespace App\Domain\Shipping;

use JsonSerializable;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Shipping
 * @ORM\Entity
 * @ORM\Table(name="shipping")
 */
class Shipping implements JsonSerializable
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $product;
    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $distance;
    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $weight;



    /**
     * Shipping constructor.
     * @param int $id
     * @param string $product
     * @param float $distance
     * @param float $weight
     */
    public function __construct(?int $id, string $product, float $distance, float $weight)
    {
        $this->id = $id;
        $this->product = $product;
        $this->distance = $distance;
        $this->weight = $weight;
    }

    /**
     * @param string $product
     */
    public function setProduct(string $product): void
    {
        $this->product = $product;
    }

    /**
     * @param float $distance
     */
    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }




    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'product' => $this->product,
            'distance' => $this->distance,
            'weight' => $this->weight
        ];
    }
}