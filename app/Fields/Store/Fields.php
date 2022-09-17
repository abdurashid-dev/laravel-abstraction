<?php

namespace App\Fields\Store;

class Fields
{
    protected $name;
    protected $rules;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function make($name)
    {
        $class = get_called_class();
        return new $class($name);
    }

    function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    function getName()
    {
        return $this->name;
    }

    function setRules($rules)
    {
        $this->rules = $rules;
        return $this;
    }

    function getRules()
    {
        return $this->rules;
    }

    public function getType()
    {
        return 'text';
    }
}
