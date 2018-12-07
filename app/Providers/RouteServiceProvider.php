<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $apiNamespace = 'App\Http\Controllers\API';
    protected $educatorNamespace = 'App\Http\Controllers\Educator';
    protected $mentorNamespace = 'App\Http\Controllers\Mentor';
    protected $learnerNamespace = 'App\Http\Controllers\Learner';
    protected $authNamespace = 'App\Http\Controllers\Auth';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapAuthRoutes();

        $this->mapAdminRoutes();

        $this->mapLearnerRoutes();

        $this->mapEducatorRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Define the "auth" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAuthRoutes()
    {

        Route::middleware('web')
            ->namespace($this->authNamespace)
            ->group(base_path('routes/auth.php'));
    }
    /**
     * Define the "learner" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapLearnerRoutes()
    {

        Route::middleware(['web', 'learner', 'auth:learner'])
            ->name('learner.')
            ->namespace($this->learnerNamespace)
            ->group(base_path('routes/learner.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web', 'admin', 'auth:admin'],
            'domain' => 'admin.' . env('APP_DOMAIN'),
            'as' => 'admin.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapEducatorRoutes()
    {
        Route::middleware('web')
             ->namespace($this->educatorNamespace)
             ->group(base_path('routes/educator.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->apiNamespace)
             ->group(base_path('routes/api.php'));
    }
}
