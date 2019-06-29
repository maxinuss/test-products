<?php
declare(strict_types=1);

namespace Products\Domain\Model\Product;

use Products\Domain\Exception\NotFoundException;
use Throwable;

class ProductNotFoundException extends \Exception implements NotFoundException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = "Product not found";
        parent::__construct($message, $code, $previous);
    }
}
