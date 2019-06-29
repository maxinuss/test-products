<?php
declare(strict_types=1);

namespace Products\Application\Action\Product;

use Products\Application\Service\Product\ProductUpdateRequest;
use Products\Application\Service\Product\ProductUpdateService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductUpdate
{
    /**
     * @var ProductUpdateService
     */
    private $service;
    /**
     * @param ProductUpdateService $service
     */
    public function __construct(ProductUpdateService $service)
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
        $body = $request->getParsedBody();

        $result = $this->service->execute(new ProductUpdateRequest(
            (int) $id ?? '',
            $body['name'] ?? '',
            (float) $body['price'] ?? ''
        ));

        if ($result === true) {
            return $response->withStatus(200);
        } else {
            return $response->withJson($result);
        }
    }
}
