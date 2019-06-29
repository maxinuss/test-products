<?php
declare(strict_types=1);

namespace Products\Infrastructure\Transformer;

use Products\Domain\Model\Product\Product;
use League\Fractal\TransformerAbstract;

class ProductListTransformer extends TransformerAbstract
{
    /**
     * @param Product $product
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'dollarPrice' => $product->getDollarPrice()
        ];
    }
}


