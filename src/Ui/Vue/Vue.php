<?php

namespace Ignite\Ui\Vue;

use Closure;

class Vue
{
    protected $renderer = [];

    public function renderAs($abstract, Closure $closure)
    {
        $this->renderer[$abstract] = $closure;
    }

    public function render(mixed $object)
    {
        $closure = $this->getRendererFor($object);

        return is_null($closure) ? $object : $closure($object);
    }

    /**
     * Get renderer for the given object.
     *
     * @param mixed $object
     *
     * @return Closure|void
     */
    public function getRendererFor(mixed $object)
    {
        foreach ($this->renderer as $abstract => $closure) {
            if ($object instanceof $abstract) {
                return $closure;
            }
        }
    }
}
