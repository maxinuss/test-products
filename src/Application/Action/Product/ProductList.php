<?php
declare(strict_types=1);

namespace Products\Application\Action\Product;

use Products\Application\Service\Product\ProductListService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductList
{
    /**
     * @var ProductListService
     */
    private $service;
    /**
     * @param ProductListService $service
     */
    public function __construct(ProductListService $service)
    {
        $this->service = $service;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $args = []): ResponseInterface
    {
        $result = $this->service->execute();

        return $response->withJson($result);
    }
}
