<?php
declare(strict_types=1);

namespace Products\Application\Service\Product;

use Products\Domain\Model\Product\Product;
use Products\Domain\Model\Product\ProductRepository;

class ProductAddService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductListService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(
        ProductRepository $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * @param ProductAddRequest $request
     *
     * @return array|bool
     */
    public function execute(ProductAddRequest $request)
    {
        try {
            $productExists = $this->productRepository->findByName($request->name());
            if ($productExists) {
                return ['error' => 'This product already exists in our database.'];
            }

            $product = new Product();
            $product->setName($request->name());
            $product->setPrice($request->price());

            $this->productRepository->add($product);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }

        return true;
    }
}
