<?php

namespace Category\DataBase\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }


    public function Categoryable()
    {
        return $this->morphTo();
    }
}
