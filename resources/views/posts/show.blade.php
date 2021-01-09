@extends('layout')

@section('head')
<style>
    .display-comment .display-comment{
        margin-left: 40px;
    }
</style>
@endsection

@section('content')

    @include('snippets._post-expanded')

    <h1 class="title has-text-centered has-text-weight-bold is-size-3 has-text-grey-lighter mb-6">Comments</h1>
    @include('snippets._comments-replies')

    @include('snippets._comment-form')
@endsection