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

    @include('_create-post-panel')

    @foreach ($posts as $post)
        {{-- @include('_post') --}}
        <h1> {{ $post->title }} </h1>
        <h2> {{ $post->body }} </h2>
    @endforeach
@endsection