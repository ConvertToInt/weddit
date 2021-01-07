@extends('layout')

@section('head')

@endsection

@section('content')

<h1 class="title has-text-centered has-text-weight-bold is-size-3 has-text-grey-lighter mb-6">Create Subweddit</h1>

<div class="columns is-centered">
    <div class="column is-half">
    <form method ="POST" action='{{url("/w")}}' enctype ="multipart/form-data">
        @csrf

        <div class="field">
            <label class="label is-medium has-text-grey-lighter">Name</label>
            <div class="control">
                <input class="input" type="text" name="name">
            </div>
        </div>

        <div class="field">
            <label class="label is-medium has-text-grey-lighter">Bio</label>
            <div class="control">
                <textarea class="textarea" name="bio"></textarea>
            </div>
        </div>

        <div class="field">
            <label class="label is-medium has-text-grey-lighter">Logo</label>
            <div class="control">
                <input class="input" type="file" name="logo">
            </div>
        </div>

        <div class="field is-grouped mt-5">
        <div class="control">
            <button class="button is-primary">Create Subweddit</button>
        </div>
        <div class="control">
            <button class="button is-link is-light">Cancel</button>
        </div>
        </div>
    </form>
    </div>
</div>
@endsection
