<?php

namespace App\Http\Controllers;

use App\Models\Subweddit;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    public function toggle(Subweddit $subweddit){

        auth()
            ->user()
            ->toggleFollow($subweddit);

        return back();

    }

}
