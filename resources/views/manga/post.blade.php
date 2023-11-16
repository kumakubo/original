@extends('layouts.layout')
@section('title','記事')
@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('manga.index') }}">記事一覧に戻る</a>
    </li>
@endsection
@section('content')
<h1>記事1</h1>
@endsection