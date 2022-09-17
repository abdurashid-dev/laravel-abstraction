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
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $validator->validated();
        $object = new $this->model;
        foreach ($fields as $field){
            $field->fill($object, $data);
        }
        $object->save();
        return $object;
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
