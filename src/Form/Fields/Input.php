<?php

namespace Ignite\Form\Fields;

use Ignite\Form\Field;

class Input extends Field
{
    /**
     * The ui component name that represents the field.
     *
     * @var string
     */
    protected $componentName = 'lit-input';

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
            'inputComponentName' => $this->inputComponentName,
        ]);
    }
}
