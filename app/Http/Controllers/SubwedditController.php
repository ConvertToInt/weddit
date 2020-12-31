<?php

namespace App\Http\Controllers;

use App\Models\Subweddit;
use Illuminate\Http\Request;

class SubwedditController extends Controller
{
    public function index(){
        $subweddits = Subweddit::with('user')->get();
        return view('subweddit.index', ['subweddits' => $subweddits]);
    } 

    public function create(){
        return view('subweddits.create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|max:255',
            'bio' => 'required|max:64000',
            //'upload' => 'required|max:2000',
        ]);

        $upload = new Upload;
        //$upload->mimeType = $request->file('subweddit')->getMimeType();
        //$upload->path = $request->file('subweddit')->store('subweddits');
        $upload->title = $request->title;
        $upload->bio = $request->bio;
        $upload->user_id = Auth::id();
        $upload->save();
        
        return view('uploads.create', ['upload'=>$upload]);
    }

    
    public function show($id){
        $subweddit = Subweddit::find($id);

        return view('subweddits.show', ['subweddit'=>$subweddit]);
    }
}
