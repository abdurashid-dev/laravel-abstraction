<?php

namespace App\Fields\Store;

class Fields
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return 'text';
    }
}
