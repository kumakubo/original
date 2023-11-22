@extends('layouts.layout')
@section('title','プロフィール作成')
@section('navbar')    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mypage.mypage.show') }}">マイページ</a>
    </li>
@endsection
@section('content')
    <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h3>プロフィール作成</h3>
                        <form action="{{ route('mypage.profile.add') }}" method="post" enctype="multipart/form-data">
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group row">
                                <label class="col-md-2">名前</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">自己紹介</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">画像</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control-file" name="image">
                                </div>
                            </div>
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </form>
                    </div>
                </div>
    </div>
@endsection