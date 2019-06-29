<?php
declare(strict_types=1);

namespace Products\Application\Action\Product;

use Products\Application\Service\Product\ProductDeleteRequest;
use Products\Application\Service\Product\ProductDeleteService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductDelete
{
    /**
     * @var ProductDeleteService
     */
    private $service;
    /**
     * @param ProductDeleteService $service
     */
    public function __construct(ProductDeleteService $service)
    {
        $this->service = $service;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param int $id
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $id): ResponseInterface
    {
        $result = $this->service->execute(new ProductDeleteRequest(
            (int) $id ?? ''
        ));

        if ($result === true) {
            return $response->withStatus(200);
        } else {
            return $response->withJson($result);
        }
    }
}
