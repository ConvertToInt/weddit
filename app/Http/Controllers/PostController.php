<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subweddit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show($subweddit, $id, $title){

        $subweddit = Subweddit::where('name', $subweddit)->firstOrFail(); // uses elequent to locate a subweddit where 'name' is equal to the value given in the uri (or fail)
        $post = Post::where('id', $id)->firstOrFail(); // again, using elequent, gets the post where the id is equal to the id passed in the URI (or fail)

        return view('posts.show', [
            'subweddit'=>$subweddit,
            'post'=>$post]);

    }

    public function file($name, $id, $title){
        $post = Post::where('id', $id)->firstOrFail();
        return response()->file(storage_path() . '/app/' . $post->thumbnail);
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
        $post->thumbnail = $request->file('thumbnail')->store('posts' . '/' . $subweddit->name);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->subweddit_id = $subweddit->id;
        $post->save();
        
        return back();
    }

    public function edit($subweddit, $id, $title){

        $subweddit = Subweddit::where('name', $subweddit)->firstOrFail(); // uses elequent to locate a subweddit where 'name' is equal to the value given in the uri (or fail)
        $post = Post::where('id', $id)->firstOrFail();

        return view('posts.edit',
                    ['subweddit'=>$subweddit,
                    'post'=>$post]);
    }

    public function update(Request $request, $subweddit, $id, $title){

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:64000',
            //'upload' => 'required|max:2000',
        ]);

        $post = Post::where('id', $id)->firstOrFail(); // uses elequent to locate a subweddit where 'name' is equal to the value given in the uri (or fail)

        $post = Post::findOrFail($post->id);
        $post->title = $request->title;
        $post->body = $request->body;
        /* if ($request->hasFile('upload')){
            Storage::delete($subweddit->path);  
            $upload->origName = $request->file('upload')->getClientOriginalName();
            $upload->path = $request->file('upload')->store('uploads');
            $upload->mimeType = $request->file('upload')->getClientMimeType();
        } */
        $post->save();
        return back();
    }

    public function destroy($subweddit, $id, $title){

        $subweddit = Subweddit::where('name', $subweddit)->firstOrFail(); // uses elequent to locate a subweddit where 'name' is equal to the value given in the uri (or fail)
        $post = Post::where('id', $id)->firstOrFail();

        $post = Post::findOrFail($post->id);
        //Storage::Delete($upload->path);
        $post->delete();

        $posts = Post::where('subweddit_id', $subweddit->id)->get();

        return view('subweddits.show',
                    ['subweddit'=>$subweddit,
                    'posts'=>$posts]);
    }
}
