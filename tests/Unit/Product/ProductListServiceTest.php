<?php
declare(strict_types=1);

namespace Tests\Unit\User;

use Mockery;

use League\Fractal\Manager;
use Products\Domain\Model\Product\Product;
use Products\Infrastructure\Service\JsonTransformer;
use League\Fractal\Serializer\DataArraySerializer;
use Products\Application\Service\Product\ProductListService;

class ProductListServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function testProductClass()
    {
        $dollarValue = 2.00;

        $p = new Product();
        $p->setName('Sugar');
        $p->setPrice(10.00);
        $p->setDollarPrice(10.00 * $dollarValue);

        $this->assertInstanceOf('Products\Domain\Model\Product\Product', $p);

        $p2 = new Product();
        $p2->setName('Salt');
        $p2->setPrice(30.00);
        $p2->setDollarPrice(30.00 * $dollarValue);

        $this->assertInstanceOf('Products\Domain\Model\Product\Product', $p2);
    }

    /** @test */
    public function testProductListService()
    {
        $dollarValue = 2.00;

        $p = new Product();
        $p->setName('Sugar');
        $p->setPrice(10.00);
        $p->setDollarPrice(10.00 * $dollarValue);

        $productId = 1;

        $mockProduct = Mockery::mock('Products\Domain\Model\Product\Product');
        $mockProduct->shouldReceive([])->once();
        $mockProduct->shouldReceive('setName')->andReturn($p);
        $mockProduct->shouldReceive('setPrice')->andReturn($p);
        $mockProduct->shouldReceive('setDollarPrice')->andReturn($p);
        $mockProduct->shouldReceive('getId')->andReturn($productId);
        $mockProduct->shouldReceive('getName')->andReturn($p->getName());
        $mockProduct->shouldReceive('getPrice')->andReturn($p->getPrice());
        $mockProduct->shouldReceive('getDollarPrice')->andReturn($p->getDollarPrice());

        $mockEntityManager = Mockery::mock('Doctrine\ORM\EntityManager');
        $mockEntityManager->shouldReceive('getReference')->with("Products\Domain\Model\Product\Product", $productId)->andReturn($mockProduct);

        $mockProductRepository = Mockery::mock('Products\Infrastructure\Domain\Model\Product\DoctrineMysqlProductRepository');
        $mockProductRepository->shouldReceive([$mockEntityManager]);
        $mockProductRepository->shouldReceive('findAll')->andReturn([$mockProduct]);

        $mockProductConfiguration = Mockery::mock('Products\Domain\Model\Product\ProductConfiguration');
        $mockProductConfiguration->shouldReceive('getDollarValue')->andReturn(2);

        $manager = new Manager();
        $manager->setSerializer(new DataArraySerializer());
        $productListService = new ProductListService($mockProductRepository, $mockProductConfiguration, new JsonTransformer($manager));

        $this->assertSame('Sugar', $productListService->execute()[0]['name']);
        $this->assertSame(20.00, $productListService->execute()[0]['dollarPrice']);
    }

    public function tearDown() {
        Mockery::close();
    }
}
