<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        /* define a admin role */
        Gate::define('isAdmin', function($user) {
            if ($user->role->slug == 'admin') {
                return true;
            }
            return false;
        });

        /* define a manager role */
        Gate::define('doctor', function($user) {
            if($user->role->slug == 'doctor'){
                return true;
            }
            return false;
        });

        /* define a contractor role */
        Gate::define('client', function($user) {
            if ($user->role->slug == 'client') {
                return true;
            }
            return false;
        });

    }
}
