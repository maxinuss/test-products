<?php
declare(strict_types=1);

namespace Products\Domain\Model\Product;

interface ProductRepository
{
    /**
     * @param Product $product
     */
    public function add(Product $product);

    /**
     * @param Product $product
     */
    public function update(Product $product);

    /**
     * @param Product $product
     */
    public function delete(Product $product);

    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function findByName(string $name);

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function findById(int $id);
}
