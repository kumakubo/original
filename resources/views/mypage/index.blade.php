@extends('layouts.layout')
@section('title','マイページ')
@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.manga.create') }}">新規投稿</a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.profile.edit') }}">プロフィール編集</a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.manga.myposts') }}">投稿一覧</a>
    </li>
@endsection
@section('content')
<h1>マイページ</h1>
@endsection