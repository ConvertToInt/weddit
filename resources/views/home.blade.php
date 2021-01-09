@extends('layout')

@section('content')
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
@endsection