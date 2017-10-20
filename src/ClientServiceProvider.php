<?php

namespace Artifact2\Client;

use Illuminate\Support\ServiceProvider;



/**
 * Class ClientServiceProvider
 * @package Artisan2\Client
 */
class ClientServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred .
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register() {

        //$this->app->singleton(Client::class, function ($app) {
        //    return new Client(config('riak'));
        //});

    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() {


        // Activate Session on boot
        $this->app->make('Illuminate\Contracts\Http\Kernel')
            ->pushMiddleware('Illuminate\Session\Middleware\StartSession');


        $this->loadViewsFrom(__DIR__ . '/resources/views', 'client');


        require __DIR__ . '/Http/routes.php';


        //$this->app->router->group([
        //    'namespace' => 'Artifact2\Client\Http\Controllers',
        //], function ($router) {
        //    include __DIR__ . '/Http/routes.php';
        //});
    }

}
