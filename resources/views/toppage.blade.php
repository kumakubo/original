<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>トップページ</title>
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }
            
            .container {
                text-align: center;
                margin-top: 50px;
            }
            
            .logo {
                max-width: 100%;
                height: auto;
            }
            
            .menu {
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }
            
            .menu a {
                margin: 0 15px;
                text-decoration: none;
                color: #333;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img src="https://i.imgur.com/GGUBQwf.png" width="200" height="200" alt="サイトロゴ" class="logo img-fluid">
            <div class="menu">
                <a href="{{ route('manga.index') }}">記事閲覧</a>
                <a href="{{ route('register') }}">新規登録</a>
                <a href="{{ route('login') }}">ログイン</a>
                 <a href="{{ route('mypage.manga.create') }}">記事作成</a>
            </div>
        </div>
        <script src="https://opcode.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>