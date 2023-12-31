@extends('layouts.front')
@section('title','記事一覧')
@section('content')
    <div class="container">
        <!--検索フォームの追加-->
        <form action="{{ url()->current() }}" method="GET">
            <div class="form-group mb-3">
                <label for="search">タイトル検索:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">検索</button>
                    </div>
                </div>
            </div>
        </form>
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <!--ユーザーがクリックして個別記事に遷移-->
                                <a href="{{ route('manga.show',['post_id' => $post->id]) }}">
                                    <div class="date">
                                        {{ $post->updated_at->format('Y年m月d日') }}
                                    </div>
                                    <div class="title">
                                        {{ Str::limit($post->title,150) }}
                                    </div>
                                </a>
                                <div class="body mt-3">
                                    {{ Str::limit($post->body,500) }}
                                    @if (strlen($post->body) > 500)
                                        <a href="{{ route('manga.show',['post_id' => $post->id]) }}">続きを読む</a>
                                    @endif
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if($post->image_path)
                                    <img src="{{secure_asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection