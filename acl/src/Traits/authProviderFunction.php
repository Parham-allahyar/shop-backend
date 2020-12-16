<?php

namespace ACL\Traits;

use ACL\Models\Permission;
use Illuminate\Support\Facades\Gate;

trait authProviderFunction
{
    public function validate()
    {
        foreach (Permission::all() as $permission) {
            Gate::define($permission->name, function ($user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }
    }
}
