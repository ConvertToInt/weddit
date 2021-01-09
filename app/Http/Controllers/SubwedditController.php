<?php

namespace App\Http\Controllers;

use App\Models\Subweddit;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SubwedditController extends Controller
{
    public function index(){
        return view('home', [
            'posts' => auth()->user()->timeline()
        ]);
    } 

    public function create(){ //NEEDS VALIDATION - ONLY ONE 'WALLSTREETBOTS' ALLOWED
        return view('subweddits.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:255|unique:subweddits|alpha_dash', // name is unique in the subweddits table
            'bio' => 'required|max:64000',
            'logo' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048', // file must be an image and have the following extensions
        ]);

        $subweddit = new Subweddit;
        $subweddit->logo = $request->file('logo')->store('subweddits' . '/' . $request->name);
        $subweddit->name = $request->name;
        $subweddit->bio = $request->bio;
        $subweddit->mod_id = Auth::id();
        $subweddit->save();

        
        
        return view('subweddits.create', ['subweddit'=>$subweddit]);
    }

    public function show($subweddit){

        //$subweddit = \DB::table('subweddits')->where('name', $name)->first();

        $subweddit = Subweddit::where('name', $subweddit)->firstOrFail(); // uses elequent to locate a row where 'name' is equal to the value given in the uri (or fail)
        $posts = Post::where('subweddit_id', $subweddit->id)->get(); // again, using elequent, gets the posts where the subweddit_id is equal to the id of the given subweddit

        //dd($posts);

         return view('subweddits.show', [
            'subweddit'=>$subweddit,
            'posts'=>$posts]); 

    }

    public function logo($subweddit){

        $subweddit = Subweddit::where('name', $subweddit)->firstOrFail();
        return response()->file(storage_path() . '/app/' . $subweddit->logo);
    }
    
    public function delete(Subweddit $subweddit){
        $subweddit = Subweddit::findOrFail($subweddit->id);
        Storage::Delete($subweddit->path);
        $subweddit->delete();
        //return view('subweddits.index'); SHOULD GO BACK TO HOME PAGE WHEN DELETED, SHOULd THERE BE A SUCCESS MESSAGE? YEAH PROBABLY DO THAT
    }
}
