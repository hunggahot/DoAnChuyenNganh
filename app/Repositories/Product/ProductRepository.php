<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepositories;
use App\Models\Product;

class ProductRepository extends BaseRepositories implements ProductRepositoryInterface
{

    public function getModel()
    {
        return Product::class;
    }
}
