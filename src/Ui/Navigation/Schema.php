<?php

namespace Ignite\Page\Navigation;

use Ignite\Vue\Component;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class Schema implements Arrayable, Jsonable
{
    protected $entries = [];

    protected $componentName = 'main-navigation';

    public function entry($title, $route)
    {
        $this->entries[] = [
            'title' => $title,
            'route' => $route,
        ];
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->entries;
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

    public function component($name)
    {
        $this->componentName = $name;

        return $this;
    }

    public function getComponent()
    {
        return new Component($this->componentName);
    }
}
