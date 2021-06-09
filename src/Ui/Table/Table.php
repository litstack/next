<?php

namespace Ignite\Ui\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Table
{
    /**
     * Table schema.
     *
     * @var Schema
     */
    protected $schema;

    protected $defaultPerPage = 10;

    protected $filters = [];

    protected $syncUrl = false;

    /**
     * Table ui component name.
     *
     * @var string
     */
    protected $componentName = 'ui-index';

    /**
     * Table ui component name.
     *
     * @var string
     */
    protected $tableComponentName = 'ui-table';

    /**
     * Pagination ui component name.
     *
     * @var string
     */
    protected $searchComponentName = 'ui-index-search';

    /**
     * Pagination ui component name.
     *
     * @var string
     */
    protected $paginationComponentName = 'ui-pagination';

    /**
     * Get table schema.
     *
     * @param  Schema $form
     * @return void
     */
    abstract public function schema(Schema $form);

    public function items(Request $request, Builder $builder, $resource)
    {
        $items = $builder
            ->take($this->defaultPerPage)
            ->paginate();

        return $resource::collection($items);
    }

    /**
     * Get wrapper ui component instance.
     *
     * @return \Ignite\Contracts\Ui\Component
     */
    public function getComponent()
    {
        return component($this->componentName, [
            'tableComponent'      => $this->getTableComponent()->toArray(),
            'searchComponent'     => $this->getSearchComponent()->toArray(),
            'paginationComponent' => $this->getPaginationComponent()->toArray(),
            'syncUrl'             => $this->syncUrl,
            'defaultPerPage'      => $this->defaultPerPage,
        ]);
    }

    public function getTableComponent()
    {
        return component($this->tableComponentName, [
            'schema' => $this->getSchema()->toArray(),
        ]);
    }

    public function getSearchComponent()
    {
        return component($this->searchComponentName, [

        ]);
    }

    public function getPaginationComponent()
    {
        return component($this->paginationComponentName, [

        ]);
    }

    public function from($route)
    {
        $this->component->prop('route', $route);

        return $this;
    }

    /**
     * Set wether the table parameters such as search, filters and pagination
     * should be synched to url parameters.
     *
     * @param  bool  $sync
     * @return $this
     */
    public function syncUrl(bool $sync = true)
    {
        // IDEA: sync multiple urls using a unique key, e.g.: posts.
        // posts.page=3&users.page=2
        $this->syncUrl = true;

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

    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * Render the table.
     *
     * @param  string                         $route
     * @return \Ignite\Contracts\Ui\Component
     */
    public function render($route)
    {
        return $this->getComponent()->bind([
            'route' => $route,
        ]);
    }
}
