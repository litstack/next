<?php

namespace Ignite\Contracts\Form;

use Ignite\Contracts\Ui\Component;

interface Field
{
    /**
     * Get the corresponding component.
     *
     * @return Component
     */
    public function getComponent();

    /**
     * Get the model attributes that are edited by the form field.
     *
     * @return array
     */
    public function attributes();
}
