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
                <ul>
                  <li class="{{ request()->routeIs('home') ? 'active' : ''}}"><a href="{{ route('home') }}">Home</a></li>
                  <li class="{{ request()->routeIs('manga.index') ? 'active' : ''}}"><a href="{{ route('manga.index') }}">新規作成</a></li>
                  
                </ul>
            </div>
      </nav>
      <div>
        @yield('content')
      </div>
      
    </body>