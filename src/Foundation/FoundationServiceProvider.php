<?php

namespace Ignite\Foundation;

use Ignite\Support\FileResponse;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class FoundationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->callAfterResolving('router', function (Router $router) {
            $router->get('admin/js/app.js', fn () => new FileResponse(__DIR__.'/../../dist/vue3/app.js'));
        });
    }
}
