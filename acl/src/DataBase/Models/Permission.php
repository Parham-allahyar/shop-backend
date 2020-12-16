<?php

namespace ACL\DataBase\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Permission extends Model
{
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
