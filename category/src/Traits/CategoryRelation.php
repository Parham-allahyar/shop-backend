<?php

namespace Category\Traits;

use Category\DataBase\Models\Category;

trait CategoryRelation
{

    public function products()
    {
        return $this->morphMany(Category::class, 'categoryable');
    }
}
