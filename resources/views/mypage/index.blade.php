@extends('layouts.layout')
@section('title','マイページ')
@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.manga.create') }}">新規投稿</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.manga.myposts') }}">投稿一覧</a>
    </li>
        <!--<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('messages.logout') }}
        </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>--!>
@endsection
@section('content')
<h1>マイページ</h1>
@endsection