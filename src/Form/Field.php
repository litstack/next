<?php

namespace Ignite\Form;

use Ignite\Contracts\Form\Field as FieldContract;

abstract class Field implements FieldContract
{
    protected $attribute;

    protected $form;

    public function __construct($attribute)
    {
        $this->attribute = $attribute;
    }

    public function bind(Form $form)
    {
        $this->form = $form;
    }

    public function mount($component)
    {
        //
    }

    public function getComponent()
    {
        $component = component($this->componentName)
            ->prop('attribute', $this->attribute);

        $this->mount($component);

        return $component;
    }

    public function attributes()
    {
        return [$this->attribute];
    }
}
