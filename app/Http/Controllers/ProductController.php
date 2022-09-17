<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return response()->json(['items' => $items]);
    }

    public function show($id)
    {
        $item = Product::findOrFail($id);
        return response()->json(['item' => $item]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $item = Product::create($data);
        return response()->json(['item' => $item]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $item = Product::findOrFail($id);
        $data = $request->validated();
        $item->update($data);
        return response()->json(['item' => $item]);
    }

    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();
        return response()->json(['item' => $item]);
    }
}
