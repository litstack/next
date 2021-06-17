<?php

namespace Ignite\Form\Fields;

use Ignite\Contracts\Form\Fields\Titleable;
use Ignite\Form\Field;

class Textarea extends Field implements Titleable
{
    use Traits\HasTitle;

    /**
     * The minimum number of rows to display.
     *
     * @var int|null
     */
    public ?int $rows = null;

    /**
     * The ui component name that represents the field.
     *
     * @var string
     */
    protected $componentName = 'ui-form-textarea';

    /**
     * The input component name.
     *
     * @var string
     */
    protected $textareaComponentName = 'ui-textarea';

    /**
     * Mount the field.
     *
     * @param  \Ignite\Contracts\Ui\Component $component
     * @return void
     */
    public function mount($component)
    {
        $component->bind([
            'textareaComponent' => $this->getTextareaComponent(),
        ]);
    }

    /**
     * Get textarea component.
     *
     * @return \Ignite\Contracts\Ui\Component
     */
    protected function getTextareaComponent()
    {
        return component($this->textareaComponentName)->bind([
            'rows' => $this->rows,
        ]);
    }

    /**
     * Set the minimum number of rows to display. Must be a value greater than 1.
     *
     * @param  int   $count
     * @return $this
     */
    public function rows(int $count)
    {
        $this->rows = $count;

        return $this;
    }
}
