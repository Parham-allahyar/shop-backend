<?php

namespace Comment\DataBase\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['comment','parent_id'];
    
    public function childs()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id')->with('childs');
    }
   

}
