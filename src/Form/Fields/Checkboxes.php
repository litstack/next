<?php

namespace Ignite\Form\Fields;

use Ignite\Form\Field;

class Checkboxes extends Field
{
    /**
     * The ui component name that represents the field.
     *
     * @var string
     */
    protected $componentName = 'ui-form-checkboxes';

    /**
     * The input component name.
     *
     * @var string
     */
    protected $checkboxComponentName = 'ui-checkbox';

    /**
     * Checkbox options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * Create new Checkboxes instance.
     *
     * @param string $attribute
     * @param array  $options
     */
    public function __construct($attribute, $options)
    {
        parent::__construct($attribute);
        $this->options = $options;
    }

    /**
     * Mount the field.
     *
     * @param  \Ignite\Contracts\Ui\Component $component
     * @return void
     */
    public function mount($component)
    {
        $component->bind([
            'checkboxComponent' => component($this->checkboxComponentName),
            'options'           => $this->options,
        ]);
    }

    /**
     * Get options.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}
