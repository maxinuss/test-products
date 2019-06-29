<?php
declare(strict_types=1);

namespace Products\Application\Action\Product;

use Products\Application\Service\Product\ProductAddRequest;
use Products\Application\Service\Product\ProductAddService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductAdd
{
    /**
     * @var ProductAddService
     */
    private $service;
    /**
     * @param ProductAddService $service
     */
    public function __construct(ProductAddService $service)
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
        $body = $request->getParsedBody();

        $result = $this->service->execute(new ProductAddRequest(
            $body['name'] ?? '',
            (float) $body['price'] ?? ''
        ));

        if ($result === true) {
            return $response->withStatus(201);
        } else {
            return $response->withJson($result);
        }
    }
}
