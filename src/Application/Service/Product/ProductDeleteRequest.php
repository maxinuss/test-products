<?php
declare(strict_types=1);

namespace Products\Application\Service\Product;

class ProductDeleteRequest
{
    /**
     * @var int
     */
    private $id;

    /**
     * ProductUpdateRequest constructor.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function id(): int
    {
        return $this->id;
    }
}