<?php

namespace Comment\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Comment\DataBase\Models\Comment;

class CommentController extends Controller
{

    public function index()
    {
         $categories = Comment::with('childs')->where('parent_id',0)->get(); 
    }
    
   
    public function store(Request $request)
    {
        
        if($request->parent_id) {
            $request->validate([
               'parent_id' => 'exists:comments,id'
            ]);
        }

        $request->validate([
            'comment' => 'required|min:3'
        ]);

        Comment::create([
            'comment'   => $request->comment,
            'parent_id' => $request->parent_id ,
        ]); 
    }


    public function update(Request $request, Comment $comment)
    { 
        if($request->parent) {
            $request->validate([
                'parent' => 'exists:comment,id'
            ]);
        }

        $request->validate([
            'comment' => 'required|min:3'
        ]);

        $comment->update([
            'comment'   => $request->name,
            'parent_id' => $request->parent_id ,
        ]);
    }

   
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }


}
