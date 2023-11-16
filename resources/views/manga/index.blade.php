@extends('layouts.layout')
@section('title','記事一覧')
@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.mypage.show') }}">マイページ</a>
    </li>
@endsection
@section('content')
    <h1>記事一覧</h1>


@endsection