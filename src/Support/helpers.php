<?php

if (! function_exists('component')) {
    /**
     * Create a component.
     *
     * @param  string                               $name
     * @param  array                                $props
     * @return \Ignite\Contracts\Ui\Component|mixed
     */
    function component($name, $props = [])
    {
        return (new Ignite\Ui\Component($name))->bind($props);
    }
}
