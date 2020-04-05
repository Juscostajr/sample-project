<?php
namespace App\Domain\Shipping;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity
 * @ORM\Table(name="pricelist")
 */
class Pricelist implements JsonSerializable
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
    private $company;
    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $fixedValue;
    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $kilogramsKilometersValue;

    private $freight;

    /**
     * Pricelist constructor.
     * @param int $id
     * @param string $company
     * @param float $fixedValue
     * @param float $kilogramsKilometersValue
     */
    public function __construct(?int $id, string $company, float $fixedValue, float $kilogramsKilometersValue)
    {
        $this->id = $id;
        $this->company = $company;
        $this->fixedValue = $fixedValue;
        $this->kilogramsKilometersValue = $kilogramsKilometersValue;
    }

    /**
     * @param string $company
     */
    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    /**
     * @param float $fixedValue
     */
    public function setFixedValue(float $fixedValue): void
    {
        $this->fixedValue = $fixedValue;
    }

    /**
     * @param float $kilogramsKilometersValue
     */
    public function setKilogramsKilometersValue(float $kilogramsKilometersValue): void
    {
        $this->kilogramsKilometersValue = $kilogramsKilometersValue;
    }

    /**
     * @param float $freight
     */
    public function setFreight(float $freight): void
    {
        $this->freight = $freight;
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
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @return float
     */
    public function getFixedValue(): float
    {
        return $this->fixedValue;
    }

    /**
     * @return float
     */
    public function getKilogramsKilometersValue(): float
    {
        return $this->kilogramsKilometersValue;
    }

    public function getFreight(): float
    {
        return $this->freight;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'company' => $this->company,
            'fixedValue' => $this->fixedValue,
            'kilogramsKilometersValue' => $this->kilogramsKilometersValue,
            'freight' => $this->freight
        ];
    }

}