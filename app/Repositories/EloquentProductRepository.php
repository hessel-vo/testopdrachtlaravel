<?php
//RapideTest

namespace App\Repositories;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class EloquentProductRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function allProducts()
    {
        return $this->model->all();
    }

    public function findProduct($id)
    {
        return $this->model->find($id);
    }

    public function createProduct(array $data)
    {
        return $this->model->create($data);
    }

    public function updateProduct($id, array $data)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }

    public function deleteProduct($id)
    {
        return $this->model->destroy($id);
    }
}
