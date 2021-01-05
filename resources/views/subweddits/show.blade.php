@extends('layout')

@section('head')

@endsection

@section('content')
    <h1>{{ $subweddit->name }}</h1>
    <h1>{{ $subweddit->bio }}</h1>

    <form method ="POST" 
        action='{{url("/w/{$subweddit->id}")}}'  
        style="display:inline!Important;">

        @csrf
        @method('delete')
        <input type="submit" value="Delete" style="display:inline!important;">
    </form><br>

    {{-- @auth
        @include('_create-post-panel')
    @endauth --}}

    @include('_create-post-panel')

    @foreach ($posts as $post)
        {{-- @include('_post') --}}
        <h1> {{ $post->title }} </h1>
        <h2> {{ $post->body }} </h2> 
        <h2> {{ $post->thumbnail }} </h2> 
        <img height="25%" width="25%" src="{{url('/w', [$subweddit->name, $post->id, $post->title, 'thumbnail'])}}"> {{-- if exists then show file, if not show default.jpg (weddit logo) (add to stoarage) --}}
    @endforeach
@endsection