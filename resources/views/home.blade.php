@extends('layout')
@section('title','Home')
@section('content')

    <h2>
        Welcome
        {{auth()->user()->name}}
    </h2>

@endsection
