<?php

namespace Category\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Category\DataBase\Models\Category;

class CategoryController extends Controller
{


    public function index()
    {
         $categories =Category::with('childs')->where('parent_id',0)->get(); 
         return $categories;
    }
    
   
    public function store(Request $request)
    {
        
        if($request->parent_id) {
            $request->validate([
               'parent_id' => 'exists:categories,id'
            ]);
        }

        $request->validate([
            'name' => 'required|min:3'
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id ,
        ]); 
    }


    public function update(Request $request, Category $category)
    {
        return $category;
        if($request->parent) {
            $request->validate([
                'parent' => 'exists:categories,id'
            ]);
        }

        $request->validate([
            'name' => 'required|min:3'
        ]);

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id ,
        ]);

       
        
    }

   
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }


}
