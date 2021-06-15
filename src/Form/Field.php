<?php

namespace Ignite\Form;

use Ignite\Contracts\Form\Field as FieldContract;

abstract class Field implements FieldContract
{
    /**
     * The attribute name that is being edited by the field.
     *
     * @var string
     */
    protected $attribute;

    /**
     * The field title.
     *
     * @var string
     */
    public $title;

    /**
     * The parent form instance that the field is bound to.
     *
     * @var \Ignite\Contracts\Form\Form|null
     */
    protected $form;

    /**
     * The ui component name that represents the field.
     *
     * @var string|null
     */
    protected $componentName;

    /**
     * Create new field instance.
     *
     * @param string $attribute
     */
    public function __construct($attribute)
    {
        $this->attribute = $attribute;
        $this->title = ucfirst(str_replace('_', ' ', $attribute));
    }

    /**
     * Mount the field.
     *
     * @param  \Ignite\Contracts\Ui\Component $component
     * @return void
     */
    public function mount($component)
    {
        //
    }

    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Bind the field to the given form.
     *
     * @param  Form $form
     * @return void
     */
    public function bind(Form $form)
    {
        $this->form = $form;
    }

    /**
     * Get the ui component that represents the form.
     *
     * @return \Ignite\Contracts\Ui\Component
     */
    public function getComponent()
    {
        $component = component($this->componentName, [
            'attribute' => $this->attribute,
            'title'     => $this->title,
        ]);

        $this->mount($component);

        return $component;
    }

    /**
     * Get the attributes that are being edited by the field.
     *
     * @return array
     */
    public function attributes()
    {
        return [$this->attribute];
    }
}
