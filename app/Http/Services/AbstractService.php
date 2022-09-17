<?php

namespace App\Http\Services;

class AbstractService
{
    protected $model;

    public function index()
    {
        return $this->model::all();
    }

    public function show($id)
    {
        return $this->model::findOrFail($id);
    }

    public function store(array $data)
    {
        return $this->model::create($data);
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