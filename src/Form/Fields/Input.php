<?php

namespace Ignite\Form\Fields;

use Ignite\Contracts\Form\Field;
use Ignite\Ui\Vue\Component;

class Input implements Field
{
    protected $attribute;

    protected $componentName = 'lit-input';

    public function __construct($attribute)
    {
        $this->attribute = $attribute;
    }

    public function getComponent()
    {
        return component($this->componentName)
            ->prop('attribute', $this->attribute);
    }

    public function attributes()
    {
        return [$this->attribute];
    }
}
