<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services you may need, sir.
     */
    public function boot(): void
    {
        model::preventLazyLoading();

     
        // Gate::define('edit-job', function (User $user, Job $job) {
        //     return $job->employer->user->is($user);
        // });
        // This is a gate that checks if the user is the employer of the job for all requests.

    }
}
