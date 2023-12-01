@extends('layouts.layout')
@section('title','post')
@section('content')
    <div class="post-container">
        <h2>{{ $post->title }}</h2>
         @if($post->image_path)
            <div class="image-container">
                <img src="{{ secure_asset('storage/image/' . $post->image_path) }}" alt="Post Image">
            </div>
        @endif
        <p class="post-body">{{ $post->body }}</p>
    </div>    
@endsection