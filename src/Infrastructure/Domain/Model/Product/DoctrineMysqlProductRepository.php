<?php
declare(strict_types=1);

namespace Products\Infrastructure\Domain\Model\Product;

use Products\Domain\Model\Product\Product;
use Products\Domain\Model\Product\ProductRepository;
use Products\Infrastructure\Domain\Model\DoctrineMysqlRepository;

class DoctrineMysqlProductRepository extends DoctrineMysqlRepository implements ProductRepository
{
    /**
     * @param Product $product
     */
    public function add(Product $product)
    {
        $this->em->persist($product);
    }

    /**
     * @param Product $product
     */
    public function update(Product $product)
    {
        $this->em->persist($product);
    }

    /**
     * @param Product $product
     */
    public function delete(Product $product)
    {
        $this->em->remove($product);
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        return $this->em->getRepository(Product::class)->findBy([], ['id' => 'DESC']);
    }

    /**
     * @param int $id
     *
     * @return bool|mixed|object|null
     */
    public function findById(int $id)
    {
        $result = $this->em->getRepository(Product::class)->findOneBy(['id' => $id]);

        return empty($result) ? false : $result;
    }

    /**
     * @param string $name
     *
     * @return bool|mixed|object|null
     */
    public function findByName(string $name)
    {
        $result = $this->em->getRepository(Product::class)->findOneBy(['name' => $name]);

        return empty($result) ? false : $result;
    }

}
