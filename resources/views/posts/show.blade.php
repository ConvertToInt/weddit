@extends('layout')

@section('head')

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
    </form>

    {{-- @include('_post-comments') --}}
@endsection