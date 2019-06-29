<?php
declare(strict_types=1);

namespace Products\Application\Service\Product;

use Products\Domain\Model\Product\ProductRepository;

class ProductDeleteService
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
     * @param ProductDeleteRequest $request
     *
     * @return array|bool
     */
    public function execute(ProductDeleteRequest $request)
    {
        try {
            $product = $this->productRepository->findById($request->id());
            if (!$product) {
                return ['error' => 'This product does not exist in our database.'];
            }

            $this->productRepository->delete($product);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }

        return true;
    }
}
