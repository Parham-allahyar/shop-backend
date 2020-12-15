<?php

namespace Category\DataBase\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name','parent_id'];
    
    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('childs');
    }
    public function parent()
    {
        return $this->belongsTo('Category', 'parent_id');
    }

}
