<?php

namespace Ignite\Ui\Table;

use Illuminate\Contracts\Support\Arrayable;

class Column implements Arrayable
{
    protected $label;

    protected $value;

    public function label($label)
    {
        $this->label = $label;

        return $this;
    }

    public function value($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'label' => $this->label,
            'value' => $this->value,
        ];
    }
}
