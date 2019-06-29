<?php
namespace Products\Domain\Model\Product;

class ProductConfiguration
{
    /**
     * @var int
     */
    protected $dollarValue;

    /**
     * ProductConfiguration constructor.
     *
     * @param float $dollarValue
     */
    public function __construct(float $dollarValue)
    {
        $this->dollarValue = $dollarValue;
    }
    /**
     * @return float
     */
    public function getDollarValue() : float
    {
        return $this->dollarValue;
    }
}