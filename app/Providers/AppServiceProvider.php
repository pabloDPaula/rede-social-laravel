<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
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
        Paginator::useBootstrapFour();
        $topUsers = Cache::remember('topUsers',  now()->addMinutes(5), function () {
            return User::withCount('followers')->orderBy('followers_count', 'desc')->limit(2)->get();
        });

        View::share('topUsers',  $topUsers);
    }
}
