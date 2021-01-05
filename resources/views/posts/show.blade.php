@extends('layout')

@section('head')
<style>
    .display-comment .display-comment{
        margin-left: 40px
    }
</style>
@endsection

@section('content')

    @include('_post-expanded')

    <form method ="POST"
                action='{{url("/w/{$subweddit->name}/comments/{$post->id}/{$post->title}/edit")}}'  
                style="display:inline!Important;"
            >

                @csrf
                @method('get')
                <input type="submit" value="Edit" style="display:inline!important;">
    </form><br>

    <br>

    @include('_comments-replies')

    <br>

    @include('_comment-form')
@endsection