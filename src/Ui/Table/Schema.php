<?php

namespace Ignite\Ui\Table;

use Illuminate\Contracts\Support\Arrayable;

class Schema implements Arrayable
{
    protected $columns = [];

    public function col()
    {
        return $this->columns[] = new Column();
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return collect($this->columns)->toArray();
    }
}
