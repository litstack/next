<?php

namespace Ignite\Form\Fields;

use Ignite\Contracts\Form\Field;

class Input implements Field
{
    protected $attribute;

    protected $componentName = 'lit-input';

    protected $inputComponentName = 'ui-input';

    public function __construct($attribute)
    {
        $this->attribute = $attribute;
    }

    public function getComponent()
    {
        return component($this->componentName)
            ->prop('attribute', $this->attribute)
            ->prop('inputComponentName', $this->inputComponentName);
    }

    public function attributes()
    {
        return [$this->attribute];
    }
}
