<?php
declare(strict_types=1);

namespace Products\Application\Service\Product;

use Products\Domain\Model\Product\ProductRepository;

class ProductUpdateService
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
     * @param ProductUpdateRequest $request
     *
     * @return array|bool
     */
    public function execute(ProductUpdateRequest $request)
    {
        try {
            $product = $this->productRepository->findById($request->id());
            if (!$product) {
                return ['error' => 'This product does not exist in our database.'];
            }

            $product->setName($request->name());
            $product->setPrice($request->price());

            $this->productRepository->update($product);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }

        return true;
    }
}
