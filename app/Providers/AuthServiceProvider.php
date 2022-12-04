<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Models\Evento;
use App\Policies\TeamPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('admin', function (User $user, Evento $evento) {
            if ($user->id == 1){
                return true;
            }
            return false;
        });
        Gate::define('Edit', function (User $user, Evento $evento) {
            if ($user->id == 1){
                return true;
            }
            return $user->id === $evento->user_id;
        });
    }
}
