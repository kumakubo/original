<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <title>@yield('title')</title>
        
        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
            <div class="container">
                <div class="ui middle aligned transparent menu page grid app-header">
                    <div class="item desktop">
                          <a href="/" style="color:black">トップページ</a>
                    </div>
                    <div class="right menu">
                                <div class="item create desktop">
                                    <a class="ui teal button" href=" ">新規投稿</a>
                                </div>
                
                                <div class="item desktop">
                                    <a class="ui teal button" href=" ">プロフィール編集</a>
                                </div>
                    </div>
                </div>
            </div>
        </nav>
            <main class="py-4">
                        {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                        @yield('content')
            </main>    
        
    </body>
    
    
    
    
</html>