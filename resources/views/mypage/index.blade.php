@extends('layouts.layout')
@section('title','マイページ')
@section('content')
  <div class="container">
    @if($profile)
      <h1>{{ $profile->name }}'s Profile</h1>
      <p>{{ $profile->introduction }}</p>
      @if($profile->image_path)
          <img src="{{ secure_asset('storage/image/' . $profile->image_path) }}" alt="{{ $profile->name }}'s Image">
      @endif
    @else
      <p>No profile available.</p>
    @endif
    <div class="edit-profile-button">
      <a href="{{ route('mypage.profile.edit',['id' => $profile->id]) }}" role="button" class="btn btn-primary">プロフィール編集</a>
    </div>
  </div>
@endsection