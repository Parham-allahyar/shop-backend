<?php

namespace Category\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Category\DataBase\Models\Category;

class CategoryController extends Controller
{
   
    public function store(Request $request)
    {
        if($request->parent) {
            $request->validate([
               'parent' => 'exists:categories,id'
            ]);
        }

        $request->validate([
            'name' => 'required|min:3'
        ]);

        Category::create([
            'name' => $request->name,
            'parent' => $request->parent ?? 0
        ]);

       
    }




}
