<?php
//RapideTest

namespace App\Repositories;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PlainSqlProductRepository implements ProductRepositoryInterface
{
    protected $table = 'products';

    public function allProducts()
    {
        return DB::select("SELECT * FROM {$this->table}");
    }

    public function findProduct($id)
    {
        return DB::selectOne("SELECT * FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function createProduct(array $data)
    {
        return DB::insert("INSERT INTO {$this->table} (name, description, price, created_at, updated_at) VALUES (?, ?, ?, ?, ?)", [
            $data['name'],
            $data['description'],
            $data['price'],
            now(),
            now()
        ]);
    }

    public function updateProduct($id, array $data)
    {
        return DB::update("UPDATE {$this->table} SET name = ?, description = ?, price = ?, updated_at = ? WHERE id = ?", [
            $data['name'],
            $data['description'],
            $data['price'],
            now(),
            $id
        ]);
    }

    public function deleteProduct($id)
    {
        return DB::delete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }
}