<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $item = Product::create($data);
        return response()->json(['item' => $item]);
    }

    public function update(Request $request, $id)
    {
        $item = Product::findOrFail($id);
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
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
