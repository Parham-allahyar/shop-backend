<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use ACL\Traits\authProviderFunction;
use ACL\DataBase\Models\Permission;
class AuthServiceProvider extends ServiceProvider
{
    use authProviderFunction;
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

   
    public function boot()
    {
        $this->registerPolicies();

       
        //authProviderFunction Trait
         $this->validate();
    }
}
