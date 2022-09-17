<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new CategoryService();
    }

    public function index()
    {
        $items = $this->service->index();
        return response()->json(['items' => $items]);
    }

    public function show($id)
    {
        $item = $this->service->show($id);
        return response()->json(['item' => $item]);
    }

    public function store(StoreRequest $request)
    {
        $item = $this->service->store($request->validated());
        return response()->json(['item' => $item]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $item = $this->service->update($request->validated(), $id);
        return response()->json(['item' => $item]);
    }

    public function destroy($id)
    {
        $item = $this->service->destroy($id);
        return response()->json(['item' => $item]);
    }
}
