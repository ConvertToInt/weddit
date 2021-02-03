<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subweddit;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function show(Subweddit $subweddit, Post $post, $slug){

        $comments = Comment::where('post_id', $post->id)->whereNull('parent_id')->get();

        return view('posts.show', [
            'subweddit'=>$subweddit,
            'post'=>$post,
            'comments'=>$comments]);

    }

    public function img(Subweddit $subweddit, Post $post, $slug){
        return response()->file(storage_path() . '/app/' . $post->img);
    }

    public function create(Subweddit $subweddit){
        return view('posts.create', [ 
            'subweddit'=>$subweddit]);

    }

    public function store(Request $request, Subweddit $subweddit){

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:64000',
            'img' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $post = new Post;
        if($request->img){
            $post->img = $request->file('img')->store('subweddits' . '/' . $subweddit->name . '/' . 'posts');
        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = Str::slug($request->title, '_');
        $post->user_id = Auth::id();
        $post->subweddit_id = $subweddit->id;
        $post->save();

        $posts = Post::where('subweddit_id', $subweddit->id)->get();

         
        return view('subweddits.show', [
            'subweddit'=>$subweddit,
            'posts'=>$posts
        ]);
    }

    public function edit(Subweddit $subweddit, Post $post, $title){

        return view('posts.edit',
                    ['subweddit'=>$subweddit,
                    'post'=>$post]);
    }

    public function update(Request $request, Subweddit $subweddit, Post $post, $slug){

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:64000',
            'img' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $post = Post::findOrFail($post->id);
        $post->title = $request->title;
        $post->body = $request->body;
        if ($request->hasFile('img')){
            Storage::delete($subweddit->img);  
            $post->img = $request->file('img')->store('subweddits' . '/' . $subweddit->name . '/' . 'posts');        
        }
        $post->save();

        $posts = Post::where('subweddit_id', $subweddit->id)->get();

        return view('subweddits.show', [
            'subweddit'=>$subweddit,
            'posts'=>$posts
        ]);
    }

    public function delete(Subweddit $subweddit, Post $post, $slug){

        Storage::Delete($post->img);
        $post->delete();

        $posts = Post::where('subweddit_id', $subweddit->id)->get();

        return view('subweddits.show',
                    ['subweddit'=>$subweddit,
                    'posts'=>$posts]);
    }
}
