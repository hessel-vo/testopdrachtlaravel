<?php
//RapideTest

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function allProducts();

    public function findProduct($id);

    public function createProduct(array $data);

    public function updateProduct($id, array $data);

    public function deleteProduct($id);
}