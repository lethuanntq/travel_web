<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Authorization
        Gate::before(function (User $user) {
            if ($user->role === User::ROLE_ADMIN) {
                return true;
            }
        });

        Gate::define('admin', function (User $user) {
           return $user->role === User::ROLE_ADMIN;
        });

        Gate::define('editor', function (User $user) {
            return $user->role === User::ROLE_EDITOR;
        });
    }
}
