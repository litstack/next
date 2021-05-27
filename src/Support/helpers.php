<?php

if (! function_exists('component')) {
    /**
     * Create a component.
     *
     * @param  string                               $name
     * @param  string|null                          $app
     * @return \Ignite\Contracts\Ui\Component|mixed
     */
    function component($name, $app = null)
    {
        return app('ui')->make($name, $app);
    }
}
