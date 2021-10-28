<?php

namespace App\Providers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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

        Gate::define('update-document', function (User $user, Document $document){
           if($user->id == $document->author || $user->role == 1){
               return Response::allow();
           }
            return Response::deny('Недостаточно прав');
        });

        Gate::define('update-user', function (User $user){
            if($user->role==1 || $user->id == Auth::id()){
                return Response::allow();
            }
            return Response::deny('Недостаточно прав');
        });

        Gate::define('show-user', function (User $user){
            if($user->role==1){
                return Response::allow();
            }
            return Response::deny('Недостаточно прав');
        });
    }
}
