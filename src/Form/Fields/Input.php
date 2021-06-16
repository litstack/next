<?php

namespace Ignite\Form\Fields;

use Ignite\Contracts\Form\Fields\Titleable;
use Ignite\Form\Field;

class Input extends Field implements Titleable
{
    use Traits\HasTitle;

    /**
     * The ui component name that represents the field.
     *
     * @var string
     */
    protected $componentName = 'ui-form-input';

    /**
     * The input component name.
     *
     * @var string
     */
    protected $inputComponentName = 'ui-input';

    /**
     * Mount the field.
     *
     * @param  \Ignite\Contracts\Ui\Component $component
     * @return void
     */
    public function mount($component)
    {
        $component->bind([
            'inputComponent' => component($this->inputComponentName),
        ]);
    }
}
