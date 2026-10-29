<?php

namespace App\Providers;

use App\Models\FrontDetial;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // Runs on every boot, including `artisan package:discover` during the
        // Vercel build, where the database may not be reachable yet.
        try {
            $sebsitefrontdetail = FrontDetial::first();
        } catch (\Throwable $e) {
            $sebsitefrontdetail = null;
        }

        View::share('appfrontdetail',$sebsitefrontdetail);
    }
}
