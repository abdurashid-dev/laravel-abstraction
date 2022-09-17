<?php

namespace App\Http\Services;

use App\Fields\Store\TextField;
use App\Models\Product;

class ProductService extends AbstractService
{
    protected $model = Product::class;

    public function getFields()
    {
        return [
            TextField::make('name')->setRules('required'),
            TextField::make('price')->setRules('required')
        ];
    }
}
