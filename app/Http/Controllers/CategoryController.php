<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends AbstractController
{
    protected $service = CategoryService::class;
    protected $storeRequest = StoreRequest::class;
    protected $updateRequest = UpdateRequest::class;
}
