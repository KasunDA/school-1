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

        $this->mapWebRoutes();

        //
        Route::middleware(['web', 'auth'])
            ->prefix('admin')
            ->name('admin.')
            ->namespace($this->namespace.'\\Admin')
            ->group(base_path('routes/admin.php'));
        //
        Route::middleware(['web', 'auth'])
            ->prefix('main')
            ->name('main.')
            ->namespace($this->namespace.'\\Main')
            ->group(base_path('routes/main.php'));
        //
        Route::middleware(['web', 'auth'])
            ->prefix('employee')
            ->name('employee.')
            ->namespace($this->namespace.'\\Employee')
            ->group(base_path('routes/employee.php'));
        //
        Route::middleware(['web', 'auth'])
            ->prefix('teacher')
            ->name('teacher.')
            ->namespace($this->namespace.'\\Teacher')
            ->group(base_path('routes/teacher.php'));
        //
        Route::middleware(['web', 'auth'])
            ->prefix('student')
            ->name('student.')
            ->namespace($this->namespace.'\\Student')
            ->group(base_path('routes/student.php'));
        //
        Route::middleware(['web', 'auth'])
            ->prefix('family')
            ->name('family.')
            ->namespace($this->namespace.'\\Family')
            ->group(base_path('routes/family.php'));
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
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
