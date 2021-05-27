<?php

namespace Ignite\Ui;

class Factory
{
    public function __construct(
        protected string $default,
        protected array $apps
    ) {
        //
    }

    public function make($name, $app = null)
    {
        $base = $this->getBaseComponent($app ?: $this->default);

        return new $base($name);
    }

    public function getBaseComponent($app)
    {
        return $this->apps[$app]['component'];
    }
}
