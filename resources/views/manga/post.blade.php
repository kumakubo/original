@extends('layouts.layout')
@section('title','post')
@section('content')
    <div class="image col-md-4 mx-auto mt-4">
        <h2 class="text-center">{{ $post->title }}</h2>
        @if($post->image_path)
            <div class="image-container">
                <img src="{{ secure_asset('storage/image/' . $post->image_path) }}" alt="Post Image">
            </div>
        @endif
        <p class="post-body">{{ $post->body }}</p>
        <p class="text-center">Written by: <a href="{{ route('profile.show', $post->user->profile->user_id) }}">{{ $post->user->profile->name }}</a></p>
    </div>    
@endsection