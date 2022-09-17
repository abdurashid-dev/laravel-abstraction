<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $items = Category::all();
        return response()->json(['items' => $items]);
    }

    public function show($id)
    {
        $item = Category::findOrFail($id);
        return response()->json(['item' => $item]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $item = Category::create($data);
        return response()->json(['item' => $item]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $item = Category::findOrFail($id);
        $data = $request->validated();
        $item->update($data);
        return response()->json(['item' => $item]);
    }

    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        $item->delete();
        return response()->json(['item' => $item]);
    }
}
