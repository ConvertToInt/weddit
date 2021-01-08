@extends('layout')

@section('head')
<style>
    .display-comment .display-comment{
        margin-left: 40px;
    }
</style>
@endsection

@section('content')

    @include('_post-expanded')

    <br>
    <h1 class="title has-text-centered has-text-weight-bold is-size-3 has-text-grey-lighter mb-6">Replies</h1>
    @include('_comments-replies')

    <br>
    <h1 class="title has-text-centered has-text-weight-bold is-size-3 has-text-grey-lighter mb-6">Post a comment</h1>
    @include('_comment-form')
@endsection