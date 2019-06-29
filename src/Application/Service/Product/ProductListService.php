<?php
declare(strict_types=1);

namespace Products\Application\Service\Product;

use Products\Domain\Model\Product\ProductRepository;
use Products\Infrastructure\Service\JsonTransformer;
use Products\Infrastructure\Transformer\ProductListTransformer;
use Products\Domain\Model\Product\ProductConfiguration;

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
     * @var JsonTransformer
     */
    private $productConfiguration;

    /**
     * ProductListService constructor.
     * @param ProductRepository $productRepository
     * @param ProductConfiguration $productConfiguration
     * @param JsonTransformer $jsonTransformer
     */
    public function __construct(
        ProductRepository $productRepository,
        ProductConfiguration $productConfiguration,
        JsonTransformer $jsonTransformer
    ) {
        $this->productRepository = $productRepository;
        $this->productConfiguration = $productConfiguration;
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
                $dollarPrice = $product->getPrice() / $this->productConfiguration->getDollarValue();
                $product->setDollarPrice($dollarPrice);
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
