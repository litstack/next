<?php

namespace Ignite\Routing;

use Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

#[Attribute]
class RouteBinder
{
    /**
     * Resource class.
     *
     * @var string
     */
    protected $resource;

    /**
     * Relationships.
     *
     * @var array
     */
    protected $relationships = [];

    /**
     * Create new Bindings instance.
     *
     * @param string $resource
     * @param array  ...$relationships
     */
    public function __construct($resource, ...$relationships)
    {
        $this->resource = $resource;
        $this->relationships = Arr::wrap($relationships);
    }

    /**
     * Bind to router.
     *
     * @param Router $router
     * @param Route  $route
     *
     * @return void
     */
    public function bindTo(Router $router, Route $route)
    {
        $name = last(array_keys($route->parameters()));

        if (! $this->isModelParameter($name, $this->getModelClass())) {
            return;
        }

        $router->bind($name, fn ($value) => $this->resolveBinding($value, $this->resource::query()));
    }

    /**
     * Resolve binding.
     *
     * @param string                                $value
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     *
     * @return mixed
     */
    protected function resolveBinding($value, $query)
    {
        return $query->where(
            $query->getModel()->getRouteKeyName(),
            $value
        )->firstOrFail();
    }

    /**
     * Get model instance.
     *
     * @return Model|mixed
     */
    public function getModel()
    {
        return $this->resource::query()->getModel();
    }

    /**
     * Get model class.
     *
     * @return string
     */
    public function getModelClass()
    {
        return get_class($this->getModel());
    }

    public function isModelParameter($name, $model)
    {
        return Str::snake(class_basename($model)) == $name;
    }
}
