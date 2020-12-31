@extends('layout')

@section('content')
<form method ="POST" action='{{url("/w")}}' enctype ="multipart/form-data">
    @csrf
    {{-- <input type="file" name="thumbnail"><br> --}}
    <input type="text" name="name">Name<br>
    <textarea name="bio"></textarea>Bio<br>
    <input type="submit" value="Create Subweddit">
</form>
@endsection
