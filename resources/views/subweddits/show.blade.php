@extends('layout')

@section('head')

@endsection

@section('content')

    {{-- <section class="hero has-background-yellow">
    <div class="hero-body">
            <div class="columns">
                <div class="column is-1">
                <img style="border-radius:100%" src="{{url('/w', [$subweddit->name, 'logo'])}}">
                </div>
                <div class="column">
                <h1 class="title has-text-white-bis">
                    {{ $subweddit->name }}
                </h1>
                <h2 class="subtitle has-text-white-bis">
                    {{ $subweddit->bio }}
                </h2>
                </div>
            </div>
    </div>
    </section> --}}

    <div class="columns is-centered">
        <div class="column is-half">
            <div class="columns is-centeres">
                <div class="column is-2">
                    <img style="border-radius:100%" src="{{url('/w', [$subweddit->name, 'logo'])}}">
                </div>
                <div class="column">
                    <h1 class="title has-text-white-bis">
                        {{ $subweddit->name }}
                    </h1>
                    <h2 class="subtitle has-text-white-bis">
                        {{ $subweddit->bio }}
                    </h2>
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
        @include('_create-post-panel')
    @endauth

    @foreach ($posts as $post)
        @include('_post')
    @endforeach
@endsection