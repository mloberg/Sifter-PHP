<?php

namespace Sifter\Resource;

class Resource
{

    protected $data = array();

    public static function make($resources)
    {
        if (count(array_filter(array_keys($resources), 'is_string'))) {
            return new static($resources);
        }
        $return = array();
        foreach ($resources as $resource) {
            $return[] = new static($resource);
        }
        return $return;
    }

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __call($name, $args)
    {
        return $this->data[$name];
    }

}
