<DOCTYPE HTML>
    <DOhtml lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')｜magicmissile.info</title>
        <meta name="description" itemprop="description" content="@yield('description')">
        <meta name="keywords" itemprop="keywords" content="@yield('keywords')">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @csrf
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


        <!-- Custom styles for this template -->
        <link href="/css/bbs/sticky-footer.css" rel="stylesheet">

        @yield('pageCss')
    </head>
    <body>

    @yield('header')

    <div class="container">
        @yield('content')
    </div><!--//container-->

    @yield('footer')

    </body>
</DOhtml>
</DOCTYPE>
