@extends('layout')

@section('head')

@endsection

@section('content')

<h1 class="title has-text-centered has-text-weight-bold is-size-3 has-text-grey-lighter mb-6">Create Post</h1>

<div class="columns is-centered">
    <div class="column is-half">
    <form method ="POST" action={{url("/w/{$subweddit->name}")}} enctype ="multipart/form-data">
        @csrf

        <div class="field">
            <label class="label is-medium has-text-grey-lighter">Title</label>
            <div class="control">
                <input class="input" type="text" name="title">
            </div>
        </div>

        <div class="field">
            <label class="label is-medium has-text-grey-lighter">Body</label>
            <div class="control">
                <textarea class="textarea" name="body"></textarea>
            </div>
        </div>

        <div class="field">
            <label class="label is-medium has-text-grey-lighter">Image (optional)</label>
            <div class="control">
                <input class="input" type="file" name="img">
            </div>
        </div>

        <div class="field is-grouped mt-5">
        <div class="control">
            <button class="button is-primary">Post to {{$subweddit->name}}</button>
        </div>
        <div class="control">
            <button class="button is-link is-light">Cancel</button>
        </div>
        </div>
    </form>
    </div>
</div>
@endsection