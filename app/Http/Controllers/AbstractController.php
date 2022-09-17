<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class AbstractController extends Controller
{
    protected $service;
    protected $storeRequest;
    protected $updateRequest;

    public function __construct()
    {
        $this->service = new $this->service;
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

    public function store()
    {
        $request = new $this->storeRequest;
        $item = $this->service->store($request->validated());
        return response()->json(['item' => $item]);
    }

    public function update($id)
    {
        $request = new $this->updateRequest;
        $item = $this->service->update($request->validated(), $id);
        return response()->json(['item' => $item]);
    }

    public function destroy($id)
    {
        $item = $this->service->destroy($id);
        return response()->json(['item' => $item]);
    }
}
