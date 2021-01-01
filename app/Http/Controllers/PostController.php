<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subweddit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request, $name){

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:64000',
            //'upload' => 'required|max:2000',
        ]);

        $subweddit = Subweddit::where('name', $name)->firstOrFail();

        //dd($subweddit);

        $post = new Post;
        //$upload->mimeType = $request->file('subweddit')->getMimeType();
        //$upload->path = $request->file('subweddit')->store('subweddits');
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->subweddit_id = $subweddit->id;
        $post->save();
        
        return back();



       /*  $attributes = request()->validate([ // validates the request & saves the validated values to an array
            'title' => 'required|max:300', 
            'body' => 'required|max:3000']); // both title and body are required and have max chars the same as a 'reddit.com' post

        $subweddit = Subweddit::where('name', $name)->firstOrFail();

        Post::create([
            'user_id' => Auth::id(),
            'title' => $attributes['title'],
            'body' => $attributes['body'],
            'subweddit_id' => ($subweddit->id)
        ]);

        return redirect('/w/', $subweddit->name); */
    }
}
