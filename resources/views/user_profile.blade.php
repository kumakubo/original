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
            <div class="container mt-4 py-4">
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
                            @foreach($posts as $post)
                              <tr>
                                <td class="text-start">{{Str::limit($post->title, 100) }}</td>
                                <td class="text-start">{{Str::limit($post->body, 250) }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
    </div>
@endsection