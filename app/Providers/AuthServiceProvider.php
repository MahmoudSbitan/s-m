<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     
   * public function boot()
    *{
       * $this->registerPolicies();

        
   * }*/
    
    public function boot(GateContract $gate)
    {

        $this->registerPolicies($gate);

        $gate->define('isAdmin', function($user){
            return $user->user_type == 'admin';
        });

        $gate->define('isEmployee', function($user){
            return $user->user_type == 'employee';
        });

        $gate->define('isSeller', function($user){
            return $user->user_type == 'seller';
        });

        $gate->define('isUser', function($user){
            return $user->user_type == 'user';
        });

        $gate->define('isBlocked', function($user){
            return $user->user_type == 'block';
        });
        
    }
}
