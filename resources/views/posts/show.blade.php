@extends('layout')

@section('head')

@endsection

@section('content')
    <h1>{{ $subweddit->name }}</h1><br><br>

    <h2>{{ $post->name }}</h2>
    <h2>{{ $post->body }}</h2>

    {{-- @include('_post-expanded')

    @include('_post-comments') --}}
@endsection