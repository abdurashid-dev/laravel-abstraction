<?php

namespace App\Http\Services;

use App\Fields\Store\TextField;
use App\Models\Category;

class CategoryService extends AbstractService
{
    protected $model = Category::class;

    public function getFields()
    {
        return [
            new TextField('name')
        ];
    }
}
