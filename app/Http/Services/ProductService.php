<?php

namespace App\Http\Services;

use App\Models\Product;

class ProductService
{
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function store(array $data)
    {
        return Product::create($data);
    }

    public function update(array $data, $id)
    {
        $item = $this->show($id);
        return $item->update($data);
    }

    public function destroy($id)
    {
        $item = $this->show($id);
        return $item->delete($id);
    }
}
