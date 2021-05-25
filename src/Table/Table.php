<?php

namespace Ignite\Table;

abstract class Table
{
    protected ?Schema $schema = null;

    protected int $defaultPerPage = 10;

    protected array $filters = [];

    abstract public function schema(Schema $form);

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
