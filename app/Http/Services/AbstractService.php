<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Validator;

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
        $fields = $this->getFields();
        $rules = [];
        foreach ($fields as $field) {
            $rules[$field->getName()] = $field->getRules();
        }
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
            dd($validator->errors());
        }
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

    public function getFields()
    {
        return [];
    }
}
