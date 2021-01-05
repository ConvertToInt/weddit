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

    public function update() {
         
    }

    public function delete() {

    }
}
