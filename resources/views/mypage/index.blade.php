@extends('layouts.layout')
@section('title','マイページ')
@section('content')
  <div class="container">
    @if($profile)
      <h1 class= "text-center">{{ $profile->name }}'s Profile</h1>
      <p class= "text-center">{{ $profile->introduction }}</p>
      @if($profile->image_path)
        <div class= "text-center">
          <img src="{{ secure_asset('storage/image/' . $profile->image_path) }}" alt="{{ $profile->name }}'s Image">
        </div>
      @endif
    @else
      <p>No profile available.</p>
    @endif
    <div class="edit-profile-button text-center mb-5">
      <a href="{{ route('mypage.profile.edit',['id' => $profile->id]) }}" role="button" class="btn btn-primary">プロフィール編集</a>
    </div>
  </div>
  <div class="container">
    <h2 class= "mb-3">投稿記事</h2>
    <div class="row">
      <div class="list-news col-md-12 mx-auto">
        <div class="row">
            <table class="table table-light">
              <thead>
                  <tr>
                      <th width="30%">タイトル</th>
                      <th width="70%">本文</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($posts->take(3) as $post)
                  <tr>
                    <td class="text-start">{{Str::limit($post->title, 100) }}</td>
                    <td class="text-start">{{Str::limit($post->body, 250) }}</td>
                  </tr>
                @endforeach
                @if($posts->count() > 3)
                  <tr>
                    <td class="text-start">Others</td>
                    <td class="text-start">
                      <a href="{{ route('mypage.manga.index') }}">View More</a>
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
@endsection