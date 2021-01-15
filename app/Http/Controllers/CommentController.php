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
    public function store(Request $request, Subweddit $subweddit, Post $post, $slug) {

        $request->validate([
            'body' => 'required|max:10000'
        ]);

        $comment =  new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->body = $request->body;

        $comment->save();

        return back();
    }

    public function reply(Request $request, Subweddit $subweddit, Post $post, $slug) {

        $request->validate([
            'body' => 'required|max:10000'
        ]);

        $comment =  new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->parent_id = $request->parent_id;
        $comment->body = $request->body;

        $comment->save();

        return back();
    }

    public function delete(Subweddit $subweddit, Post $post, $slug, Comment $comment) {

        //$replies = Comment::where('parent_id', $comment->id)->get()->delete();
        $comment->delete();
        
        $comments = Comment::where('post_id', $post->id)->whereNull('parent_id')->get();

        return back();
    }
}
