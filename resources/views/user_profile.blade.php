@extends('layouts.layout')
@section('title','プロフィール閲覧')
@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.index') }}">記事一覧に戻る</a>
    </li>
@endsection
@section('content')
<h1>プロフィール閲覧</h1>
@endsection