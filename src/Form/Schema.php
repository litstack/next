<?php

namespace Ignite\Form;

use Ignite\Contracts\Form\Field;

class Schema
{
    /**
     * Form fields.
     *
     * @var array
     */
    protected $fields = [];

    /**
     * A list of ui components that represent the form.
     *
     * @var array
     */
    protected $components = [];

    public function fields(array $fields)
    {
        foreach ($fields as $field) {
            $this->field($field);
        }

        return $this;
    }

    public function field(Field $field)
    {
        $this->fields[] = $field;
        $this->components[] = $field->getComponent();

        return $this;
    }

    public function applyTo($component)
    {
        $component
            ->prop('attributes', collect($this->fields)->map(fn ($field) => $field->attributes())->flatten()->toArray())
            ->prop('schema', collect($this->components)->toArray());
    }
}
