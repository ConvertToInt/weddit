<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subweddit;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $subweddit, $id, $title) {

        $comment =  new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->id;
        $comment->body = $request->body;

        $comment->save();

        return back();
    }

    public function reply(Request $request, $subweddit, $id, $title) {

        $comment =  new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->id;
        $comment->parent_id = $request->parent_id;
        $comment->body = $request->body;

        $comment->save();

        return back();
    }

    public function delete($subweddit, $id, $title, $comment) {
        $subweddit = Subweddit::where('name', $subweddit)->firstOrFail(); // uses elequent to locate a subweddit where 'name' is equal to the value given in the uri (or fail)
        $post = Post::where('id', $id)->firstOrFail();
        $comment = Comment::where('id', $comment)->firstOrFail();

        $comment = Comment::findOrFail($comment->id);
        //Storage::Delete($upload->path);
        $comment->delete();
        
        $comments = Comment::where('post_id', $id)->whereNull('parent_id')->get();

        return view('posts.show',
                    ['subweddit'=>$subweddit,
                    'post'=>$post,
                    'comments'=>$comments]);
    }
}
