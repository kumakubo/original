@extends('layouts.layout')
@section('title','プロフィール編集')
@section('navbar')    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.mypage.show') }}">マイページ</a>
    </li>
@endsection
@section('content')
<h1>プロフィール編集画面</h1>
@endsection