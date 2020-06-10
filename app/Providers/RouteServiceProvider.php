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
    protected $namespace_instructor = 'App\Http\Controllers\Instructor';
    protected $namespace_student = 'App\Http\Controllers\Student';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = 'en/student';

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
        $this->mapStudentRoutes();
        $this->mapInstrucrorRoutes();
        $this->mapAdminRoutes();

        //
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
    protected function mapStudentRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace_student)
            ->group(base_path('routes/Student/web.php'));
    }
    protected function mapInstrucrorRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace_instructor)
            ->group(base_path('routes/Instructor/web.php'));
    }
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Admin/web.php'));
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
