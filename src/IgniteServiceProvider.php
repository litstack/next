<?php

namespace Ignite;

use Ignite\Foundation\FoundationServiceProvider;
use Ignite\Ui\UiServiceProvider;
use Ignite\Ui\Vue\Vue;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

class IgniteServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(UiServiceProvider::class);
        $this->app->register(FoundationServiceProvider::class);
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ignite');

        $this->app->singleton('ignite.vue', function () {
            $vue = new Vue();

            $vue->renderAs(Route::class, function (Route $route) {
                return [
                    'route'  => $route->uri(),
                    'method' => $route->methods()[0],
                    'name'   => $route->getName(),
                ];
            });

            return $vue;
        });
    }
}
