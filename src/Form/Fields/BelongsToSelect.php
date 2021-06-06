<?php

namespace Ignite\Form\Fields;

use Ignite\Form\Field;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BelongsToSelect extends Field
{
    protected $componentName = 'lit-relation-belongs-to-select';

    protected BelongsTo $relation;

    protected $indexRoute;

    protected $value;

    public function __construct(BelongsTo $relation, $indexRoute)
    {
        $this->relation = $relation;
        $this->indexRoute = $indexRoute;

        parent::__construct($relation->getForeignKeyName());
    }

    public function mount($component)
    {
        $component
            ->prop('index-route', $this->indexRoute)
            ->prop('owner-key', $this->relation->getOwnerKeyName())
            ->prop('value', $this->value);
    }

    public function value($value)
    {
        $this->value = $value;

        return $this;
    }
}
