@extends('layouts.layout')
@section('title','プロフィール閲覧')
@section('content')
    <div class="container">
        <h1>{{ $profile->name }}'s Profile</h1>
        @if($profile)
            <p>{{ $profile->introduction }}</p>
            <img src="{{ secure_asset('storage/image/' . $profile->image_path) }}" alt="{{ $profile->name }}'s Image">
        @else
            <p>No profile available.</p>
        @endif
    </div>
@endsection