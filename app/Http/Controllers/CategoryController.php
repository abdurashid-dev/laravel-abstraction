<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $item = Category::create($data);
        return response()->json(['item' => $item]);
    }

    public function update(Request $request, $id)
    {
        $item = Category::findOrFail($id);
        $data = $request->validate([
            'name' => 'required'
        ]);
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
