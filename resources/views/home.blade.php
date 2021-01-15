@extends('layout')

@section('content')


@if ($posts->isEmpty())
    <div class="columns is-centered">
        <div class="column is-half">
        <h1 class="title has-text-centered has-text-weight-bold is-size-3 has-text-grey-lighter mb-6">No Posts yet...</h1>
        </div>
        <div class="column is-one-quarter">
        @include('snippets._subweddits-list')
    </div>
    </div>
    @else
    <div class="columns">
    <div class="column"></div>
    <div class="column is-half">
        @foreach($posts as $post)
            @include('snippets._post')    
        @endforeach
    </div>
    <div class="column is-one-quarter">
        @include('snippets._subweddits-list')
    </div>
    <div class="column"></div>
</div>
    @endif
@endsection