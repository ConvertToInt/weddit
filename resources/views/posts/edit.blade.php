@extends('layout')

@section('head')

@endsection

@section('content')
<form method ="POST" action='{{url("/w/{$subweddit->name}/comments/{$post->id}/{$post->title}")}}' enctype ="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- <input type="file" name="upload"><br> --}}
    <input type="text" name="title" value="{{$post->title}}">Title<br>
    <textarea name="body">{{$post->body}}</textarea>Body<br>
    <input type="submit" value="Save Post">
</form>

<br><a href="{{url("/w/{$subweddit->name}/comments/{$post->id}/{$post->title}")}}">Back to Post</a>

@endsection