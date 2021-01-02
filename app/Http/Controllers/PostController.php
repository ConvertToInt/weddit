<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subweddit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show($subweddit, $id, $name){

        $subweddit = Subweddit::where('name', $subweddit)->firstOrFail(); // uses elequent to locate a subweddit where 'name' is equal to the value given in the uri (or fail)
        $post = Post::where('id', $id)->firstOrFail(); // again, using elequent, gets the post where the id is equal to the id passed in the URI (or fail)

        return view('posts.show', [
            'subweddit'=>$subweddit,
            'post'=>$post]);

    }

    public function store(Request $request, $name){

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:64000',
            //'upload' => 'required|max:2000',
        ]);

        $subweddit = Subweddit::where('name', $name)->firstOrFail();

        $post = new Post;
        //$upload->mimeType = $request->file('subweddit')->getMimeType();
        //$upload->path = $request->file('subweddit')->store('subweddits');
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->subweddit_id = $subweddit->id;
        $post->save();
        
        return back();
    }
}
