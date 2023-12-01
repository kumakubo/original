<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Default Title')</title>
    {{-- Laravel標準で用意されているCSSを読み込みます --}}
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    {{-- この章の後半で作成するCSSを読み込みます --}}
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    
    <style>
        @guest
            .navbar-nav {
                margin-left: 0 !important;
            }
        @endguest
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href=" {{ route('manga.index') }}">
            <img src="https://i.imgur.com/ld3xoQv.png" alt="サイトロゴ" class="icon">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                 <!-- Right Side Of Navbar -->
                <!-- Authentication Links -->
                {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                @guest
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a></li>
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                @else
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                         </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('messages.logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mypage.manga.create') }}">新規投稿</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mypage.manga.index') }}">投稿一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mypage.mypage.show') }}">マイページ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mypage.profile.create') }}">プロフィール作成</a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
