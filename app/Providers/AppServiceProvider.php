<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use View;
use App\Models\Job;

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
        $cities = Job::select('location_city')
                        ->where('location_city', '!=', '')->get()->unique('location_city')->pluck('location_city')->values()->all();
        $states = Job::select('location_state')
                        ->where('location_state', '!=', '')->get()->unique('location_state')->pluck('location_state')->values()->all();

        View::share('cities', $cities);
        View::share('states', $states);
    }
}
