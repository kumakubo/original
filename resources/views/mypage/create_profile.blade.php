@extends('layouts.layout')
@section('title','プロフィール作成')
@section('navbar')    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.mypage.show') }}">マイページ</a>
    </li>
@endsection
@section('content')
<h1>プロフィール作成</h1>
@endsection