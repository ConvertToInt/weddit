@extends('layout')

@section('head')

@endsection

@section('content')

    <div class="columns is-centered mb-6">
        <div class="column is-half">
            <div class="columns is-vcentered">
                <div class="column is-2">
                    <img style="border-radius:15%" src="{{url('/w', [$subweddit->name, 'logo'])}}">
                </div>
                <div class="column">
                    <h1 class="title is-1 has-text-white-bis">
                        {{ $subweddit->name }}
                    </h1>
                </div>  
            </div>
        </div>     
    </div>


    {{-- @include('_follow-button') --}}

    <form method ="POST"
        action='{{url("/w/{$subweddit->id}/toggleFollow")}}'  
        style="display:inline!Important;">
        @csrf

        <button type="submit">
            {{ auth()->user()->following($subweddit->id) ? 'Unfollow' : 'Follow'}}
        </button>
    </form><br>

    <form method ="POST" 
        action='{{url("/w/{$subweddit->id}")}}'  
        style="display:inline!Important;">

        @csrf
        @method('delete')
        <input type="submit" value="Delete" style="display:inline!important;">
    </form><br>

    @auth
        @include('snippets._create-post-panel')
    @endauth

    @foreach ($posts as $post)
        @include('snippets._post')
    @endforeach
@endsection