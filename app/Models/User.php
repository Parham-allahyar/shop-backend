<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use ACL\Traits\userModelFunctions;
use ACL\DataBase\Models\Permission;
use ACL\DataBase\Models\Role;
class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, userModelFunctions;

   
    protected $fillable = [
        'name',
        'phone_Number',   
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

   
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($roles)
    {
        return !! $roles->intersect($this->roles)->all();
    }

    public function hasPermission($permission)
    {
        dd($permission->roles);
        return $this->permissions->contains('name' , $permission->name) || $this->hasRole($permission->roles);
    }

}
