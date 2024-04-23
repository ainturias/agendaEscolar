<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('Admin-access', function ($user) {
           
            return $user->hasRole('Admin');
            
        });
        // esto aumente para que el Profesor pueda acceder a las rutas de entrenador
        Gate::define('Profesor-access', function ($user) {
           
            return $user->hasRole('Profesor');
            
        });
        Gate::define('Estudiante-access', function ($user) {
           
            return $user->hasRole('Estudiante');
            
        });
        Gate::define('Padre-access', function ($user) {
           
            return $user->hasRole('Padre');
            
        });
    }
}
