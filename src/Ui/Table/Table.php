<?php

namespace Ignite\Ui\Table;

abstract class Table
{
    protected ?Schema $schema = null;

    protected int $defaultPerPage = 10;

    protected array $filters = [];

    abstract public function schema(Schema $form);

    public function __construct()
    {
        $this->component = component($this->getComponentName())
            ->prop(
                'items-component',
                component('ui-table')
            ->prop('schema', $this->getSchema()->toArray())
            ->toArray()
            )
            ->prop('pagination-component', component('ui-pagination')->toArray());
    }

    public function getComponentName()
    {
        return 'ui-index';
    }

    public function getComponent()
    {
        return $this->component;
    }

    public function from($route)
    {
        $this->component->prop('route', $route);

        return $this;
    }

    public function syncUrl(bool $sync = true)
    {
        // IDEA: sync multiple urls using a unique key, e.g.: posts.
        // posts.page=3&users.page=2
        $this->component->prop('sync-url', $sync);

        return $this;
    }

    public function getSchema()
    {
        if ($this->schema) {
            return $this->schema;
        }

        $this->schema(
            $this->schema = new Schema()
        );

        return $this->schema;
    }

    public function filters()
    {
        return $this->filters;
    }
}
