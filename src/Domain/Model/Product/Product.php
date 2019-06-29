<?php
declare(strict_types=1);

namespace Products\Domain\Model\Product;

/**
 * Product
 */
class Product
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $dollarPrice;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice() : float
    {
        return (float) $this->price;
    }

    /**
     * @return float
     */
    public function getDollarPrice() : float
    {
        return (float) $this->dollarPrice;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name) : Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setPrice(float $price) : Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param float $dollarPrice
     * @return Product
     */
    public function setDollarPrice(float $dollarPrice) : Product
    {
        $this->dollarPrice = $dollarPrice;
        return $this;
    }
}

