<?php

namespace Ignite\Ui\Page;

use Ignite\Support\Vue;
use Ignite\Table\Table;
use Ignite\Vue\Component;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Route;
use Illuminate\View\View;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

abstract class Page implements Renderable
{
    /**
     * Vue components.
     *
     * @var array
     */
    protected $components = [];

    /**
     * The resource route.
     *
     * @var array
     */
    protected $resource;

    protected $view;

    abstract public function mount($component);

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        if (request()->wantsJson()) {
            return $this->toJson();
        }

        return view($this->view, [
            'page' => view(
                $this->getViewName(),
                $this->getViewData()
            )->render(),
        ]);
    }

    public function view($name)
    {
        $this->view = $name;

        return $this;
    }

    /**
     * Convert the object to its Array representation.
     *
     * @param  int   $options
     * @return array
     */
    public function toArray()
    {
        return [
            'resource'   => $this->resource,
            'components' => collect($this->components)->map(fn ($component) => $component->toArray()),
            'title'      => $this->title,
        ];
    }

    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int    $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Add form.
     *
     * @param  string $form
     * @param  string $route
     * @return $this
     */
    public function form($form, $route)
    {
        $this->components[] = (new $form)->render(
            $route instanceof Route ? $route : $this->getRouteByName($route)
        );

        return $this;
    }

    public function component(Component $component)
    {
        $this->components[] = $component;

        return $this;
    }

    /**
     * Add index table to page.
     *
     * @param  Table|string $table
     * @param  string       $route
     * @return Table
     */
    public function table($table, $route = null)
    {
        if (! $table instanceof $table) {
            $table = new $table;
        }

        if (! is_null($route)) {
            $table->from($route);
        }

        $this->components[] = $table->getComponent();

        return $table;
    }

    /**
     * Get route by name.
     *
     * @param  string $name
     * @return Route
     *
     * @throws \Symfony\Component\Routing\Exception\RouteNotFoundException
     */
    protected function getRouteByName($name)
    {
        $routes = app()->instance(
            'routes', app('router')->getRoutes()
        );

        if ($route = $routes->getByName($name)) {
            return $route;
        }

        throw new RouteNotFoundException("Route [{$name}] not defined.");
    }

    /**
     * Set resource.
     *
     * @param  Route|string $resource
     * @param  array        $parameters
     * @param  bool         $absolute
     * @return $this
     */
    public function resource($route, array $parameters = [], $absolute = true)
    {
        $route = $route instanceof Route
            ? $route
            : $this->getRouteByName($route, $parameters, $absolute);

        $this->resource = Vue::render($route);
        $this->resource['route'] = url()->toRoute($route, $parameters, $absolute);

        return $this;
    }

    /**
     * Get view data.
     *
     * @return array
     */
    public function getViewData()
    {
        $this->mount($component = component($this->layout));

        $component->prop('page', $this->toArray());

        return [
            'component' => $component,
        ];
    }

    /**
     * Get view name.
     *
     * @return string
     */
    public function getViewName()
    {
        return 'ignite::app';
    }

    /**
     * Render the page.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }
}
