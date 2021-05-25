<?php

namespace Ignite\Vue;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Renderable;

class Component implements Arrayable, Jsonable, Renderable
{
    protected $props = [];

    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function bind($props)
    {
        foreach ($props as $name => $prop) {
            $this->props[$name] = $prop;
        }

        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'props' => $this->props,
            'name'  => $this->name,
        ];
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int    $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        return $this->toJson();
    }
}
