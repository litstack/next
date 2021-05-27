<?php

namespace Ignite\Ui;

use Illuminate\Support\ServiceProvider;

class UiServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ui', function () {
            return new Factory(config('lit.default_app'), config('lit.apps'));
        });
    }
}
