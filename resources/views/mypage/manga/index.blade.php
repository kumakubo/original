@extends('layouts.layout')
@section('title','投稿一覧')
@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.mypage.show') }}">マイページ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.manga.create') }}">新規投稿</a>
    </li>
@endsection
@section('content')
<h1>投稿記事一覧</h1>
@endsection