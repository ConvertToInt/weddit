@extends('layout')

@section('head')

@endsection

@section('content')

    <div class="columns is-centered mb-6">
        <div class="column is-half">
            <div class="columns is-vcentered">
                <div class="column is-2">
                    <img style="border-radius:15%" src="{{url('/w', [$subweddit->name, 'logo'])}}">
                </div>
                <div class="column">
                    <h1 class="title is-1 has-text-white-bis">
                        {{ $subweddit->name }}
                    </h1>
                </div>
                @auth
                <div class="column is-2">
                @include('snippets._follow-button')
                </div>  
                <div class="column is-1">
                @include('snippets._delete-button')
                </div>   
                @endauth     
            </div>
        </div>     
    </div>

    @if ($posts->isEmpty())
        <div class="columns is-centered">
        <div class="column is-half">
        <h1 class="title has-text-centered has-text-weight-bold is-size-3 has-text-grey-lighter mb-6">No Posts yet..</h1>
        @auth
            @include('snippets._create-post-panel')
        @endauth
        </div>
        <div class="column"></div>
    </div>
    @else
    <div class="columns is-centered">
    <div class="column"></div>
        <div class="column is-half">
        @auth
            @include('snippets._create-post-panel')
        @endauth
        @foreach ($posts as $post)
            @include('snippets._post')
        @endforeach
        </div>
        <div class="column is-one-quarter">
            @include('snippets._subweddit-bio')
        </div>
        <div class="column"></div>
    </div>
    @endif

@endsection