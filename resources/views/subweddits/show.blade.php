@extends('layout')

@section('head')

@endsection

@section('content')
    <h1>{{ $subweddit->name }}</h1>
    <h1>{{ $subweddit->bio }}</h1>
    <form method ="POST" 
                action='{{url("/w/{$subweddit->id}")}}'  
                style="display:inline!Important;">

                @csrf
                @method('delete')
                <input type="submit" value="Delete" style="display:inline!important;">
            </form>
@endsection