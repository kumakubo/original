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
    <div class="container">
        <div class="row">
            <h2>投稿記事一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('mypage.manga.create') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('mypage.manga.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($searchResults as $posts)
                                <tr>
                                    <th>{{ $posts->id }}</th>
                                    <td>{{ Str::limit($posts->title, 100) }}</td>
                                    <td>{{ Str::limit($posts->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('mypage.manga.edit',['id' => $posts->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('mypage.manga.delete',['id' => $posts->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection