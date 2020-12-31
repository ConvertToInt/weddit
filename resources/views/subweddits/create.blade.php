@extends('layout')

@section('content')
<form method ="POST" action='{{url("/subweddits")}}' enctype ="multipart/form-data">
    @csrf
    {{-- <input type="file" name="thumbnail"><br> --}}
    <input type="text" name="name">Name<br>
    <textarea name="bio"></textarea>Bio<br>
    <input type="submit" value="Create Subweddit">
</form>

@if ($errors->any())
    <div class="alert is-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
