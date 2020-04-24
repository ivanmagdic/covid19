<?php


namespace Imagdic\Covid19;


use Illuminate\Support\ServiceProvider;

class Covid19ServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('covid19', function () {
            return new Covid19();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Covid19::class];
    }
}
