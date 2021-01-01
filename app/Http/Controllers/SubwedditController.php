<?php

namespace App\Http\Controllers;

use App\Models\Subweddit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SubwedditController extends Controller
{
    public function index(){
        $subweddits = Subweddit::with('user')->get();
        return view('subweddit.index', ['subweddits' => $subweddits]);
    } 

    public function create(){ //NEEDS VALIDATION - ONLY ONE 'WALLSTREETBOTS' ALLOWED
        return view('subweddits.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:255',
            'bio' => 'required|max:64000',
            //'upload' => 'required|max:2000',
        ]);

        $subweddit = new Subweddit;
        //$upload->mimeType = $request->file('subweddit')->getMimeType();
        //$upload->path = $request->file('subweddit')->store('subweddits');
        $subweddit->name = $request->name;
        $subweddit->bio = $request->bio;
        $subweddit->mod_id = Auth::id();
        $subweddit->save();
        
        return view('subweddits.create', ['subweddit'=>$subweddit]);
    }

    public function show($name){

        //$subweddit = \DB::table('subweddits')->where('name', $name)->first();

        $subweddit = Subweddit::where('name', $name)->firstOrFail(); // uses elequent to locate a row where 'name' is equal to the value given in the uri (or fail)

        return view('subweddits.show', ['subweddit'=>$subweddit]);
        
    }
    
    public function delete(Subweddit $subweddit){
        $subweddit = Subweddit::findOrFail($subweddit->id);
        Storage::Delete($subweddit->path);
        $subweddit->delete();
        //return view('subweddits.index'); SHOULD GO BACK TO HOME PAGE WHEN DELETED, SHOULd THERE BE A SUCCESS MESSAGE? YEAH PROBABLY DO THAT
    }
}
