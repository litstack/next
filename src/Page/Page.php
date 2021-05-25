<?php

namespace Ignite\Page;

use Ignite\Support\Vue;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Route;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class Page implements Renderable, Arrayable
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
     * @var Route
     */
    protected Route $resource;

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        // if (request()->needsJson()) {
        //     return json_encode($this->toArray());
        // }

        // return json_encode($this->toArray());

        return view(
            $this->getViewName(),
            $this->getViewData()
        );
    }

    public function toArray()
    {
        return [
            'resource'   => Vue::render($this->resource),
            'components' => collect($this->components)->map(fn ($component) => $component->toArray()),
        ];
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
     * @return $this
     */
    public function resource($route)
    {
        $this->resource = $route instanceof Route
            ? $route
            : $this->getRouteByName($route);

        return $this;
    }

    /**
     * Get view data.
     *
     * @return array
     */
    public function getViewData()
    {
        return [

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
