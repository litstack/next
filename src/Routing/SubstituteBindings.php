<?php

namespace Ignite\Routing;

use Closure;
use Illuminate\Routing\Middleware\SubstituteBindings as BaseSubstituteBindings;
use ReflectionClass;

class SubstituteBindings extends BaseSubstituteBindings
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($binder = $this->getRouteBinder($request)) {
            $binder->bindTo($this->router, $request->route());
        }

        return parent::handle($request, $next);
    }

    /**
     * Get route binder.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Ignite\Route\RouteBinder|void
     */
    protected function getRouteBinder($request)
    {
        $controller = $request->route()->getController();

        if (! $controller) {
            return;
        }

        $attributes = (new ReflectionClass($controller))->getAttributes();

        foreach ($attributes as $attribute) {
            $name = $attribute->getName();
            if ($name == RouteBinder::class || is_subclass_of($name, RouteBinder::class)) {
                return $attribute->newInstance();
            }
        }
    }
}
