@extends('layout')

@section('head')

@endsection

@section('content')

<h1 class="title has-text-centered has-text-weight-bold is-size-3 has-text-grey-lighter mb-6">Edit Post</h1>

<div class="columns is-centered">
    <div class="column is-half">
    <form method ="POST" action='{{url("/w/{$subweddit->name}/comments/{$post->id}/{$post->title}")}}' enctype ="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="field">
            <label class="label is-medium has-text-grey-lighter">Title</label>
            <div class="control">
                <input class="input" type="text" name="title" value="{{$post->title}}">
            </div>
        </div>

        <div class="field">
            <label class="label is-medium has-text-grey-lighter">Body</label>
            <div class="control">
                <textarea class="textarea" name="body" value="{{$post->body}}"></textarea>
            </div>
        </div>

        <div class="field">
            <label class="label is-medium has-text-grey-lighter">Thumbnail</label>
            <div class="control">
                <input class="input" type="file" name="thumbnail">
            </div>
        </div>

        <div class="field is-grouped mt-5">
        <div class="control">
            <button class="button is-primary">Edit</button>
        </div>
        <div class="control">
            <form method ="POST" 
                action='{{url("/w/{$subweddit->name}/comments/{$post->id}/{$post->title}")}}'  
                style="display:inline!Important;">

                @csrf
                @method('delete')
                <button type="submit" class="button is-danger">Delete</button>
            </form>
        </div>
        <div class="control">
            <button class="button is-link is-light">Cancel</button>
        </div>
        </div>
    </form>
    </div>
</div>



<br><a href="{{url("/w/{$subweddit->name}/comments/{$post->id}/{$post->title}")}}">Back to Post</a>

@endsection