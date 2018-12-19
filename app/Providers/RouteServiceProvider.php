<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

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
    protected $mentorNamespace = 'App\Http\Controllers\Mentor';
    protected $learnerNamespace = 'App\Http\Controllers\Learner';
    protected $adminNamespace = 'App\Http\Controllers\Admin';
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

        Route::domain(config('app.url'))
            ->middleware(['web', 'learner', 'auth:learner'])
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

        Route::domain('admin.' . config('app.url'))
            ->middleware(['web', 'admin', 'auth:admin'])
            ->name('admin.')
            ->namespace($this->adminNamespace)
            ->group(base_path('routes/admin.php'));
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
