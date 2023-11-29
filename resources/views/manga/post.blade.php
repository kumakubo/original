@extends('layouts.layout')
@section('title','post')
@section('content')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
    
    @if($post->image_path)
        <img src="{{ secure_asset('storage/image/' . $post->image_path) }}" alt="Post Image">
    @endif
@endsection