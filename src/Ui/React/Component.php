<?php

namespace Ignite\Ui\React;

use Ignite\Contracts\Ui\ReactComponent;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Renderable;
use InvalidArgumentException;

/**
 * @see https://v3.vuejs.org/guide/migration/render-function-api.html#vnode-props-format
 */
class Component implements ReactComponent, Arrayable, Jsonable, Renderable
{
    protected $props = [];

    protected $name;

    protected $id;

    protected $key;

    protected array $class = [];

    protected array $style = [];

    protected $html;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function bind($props)
    {
        foreach ($props as $name => $value) {
            $this->props[$name] = $value;
        }

        return $this;
    }

    public function prop($name, $value)
    {
        $this->props[$name] = $value;

        return $this;
    }

    public function class($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Add component style.
     *
     * @param array|string $property
     * @param mixed        $value
     *
     * @return $this
     */
    public function style($property, $value = null)
    {
        if (is_null($value) && !is_array($property)) {
            throw new InvalidArgumentException(sprintf('Missing value for property style [?].', $property));
        }

        $properties = is_null($value) ? $property : [$property => $value];

        foreach ($properties as $property => $value) {
            $this->style[$property] = $value;
        }

        return $this;
    }

    /**
     * Set component id.
     *
     * @param string $id
     *
     * @return $this
     */
    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    public function innerHTML($html)
    {
        $this->innerHTML = $html;

        return $this;
    }

    public function key($key)
    {
        $this->key = $key;

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
     * @param int $options
     *
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
