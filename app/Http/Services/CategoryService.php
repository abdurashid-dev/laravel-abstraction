<?php

namespace App\Http\Services;

use App\Models\Category;

class CategoryService
{
    public function index()
    {
        return Category::all();
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function store(array $data)
    {
        return Category::create($data);
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
