<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $api_controller_namespace = 'App\Http\Api\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->configureAPIRoute();

        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }

    /**
     * ���� API ·��.
     */
    public function configureAPIRoute()
    {
        $api_router = app('Dingo\Api\Routing\Router');
        $api_router->group([
            'version'   => env('API_VERSION'),
            'namespace' => $this->api_controller_namespace,
        ], function ($router) {
            require app_path('Http/api_routes.php');
        });
    }
}
