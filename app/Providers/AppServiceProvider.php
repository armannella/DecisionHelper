<?php

namespace App\Providers;

use App\Models\Decision;
use App\Models\Factor;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isFactorForDecision' , function(User $user, Decision $decision , Factor $factor){
            if($decision->id == $factor->decision_id){
                return true;
            }
            else {
                return false ;
            }
        });
    }
}
