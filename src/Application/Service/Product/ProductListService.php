<?php
declare(strict_types=1);

namespace Products\Application\Service\Product;

use Products\Domain\Model\Product\ProductRepository;
use Products\Infrastructure\Service\JsonTransformer;
use Products\Infrastructure\Transformer\ProductListTransformer;

class ProductListService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var JsonTransformer
     */
    private $jsonTransformer;

    /**
     * ProductListService constructor.
     * @param ProductRepository $productRepository
     * @param JsonTransformer $jsonTransformer
     */
    public function __construct(
        ProductRepository $productRepository,
        JsonTransformer $jsonTransformer
    ) {
        $this->productRepository = $productRepository;
        $this->jsonTransformer = $jsonTransformer;
    }

    /**
     * @return array
     */
    public function execute()
    {
        $productsArray = [];

        try {
            $products = $this->productRepository->findAll();

            foreach($products as $product){
                $productsArray[] = $this->jsonTransformer->formatItem($product, new ProductListTransformer());
            }
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }

        return $productsArray;
    }
}
