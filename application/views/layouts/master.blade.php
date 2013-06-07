<!doctype html>
<html lang="jp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="ATNDさーち,ATNDサーチ,ATND,イベント検索">
    <meta name="description" content="ATNDのイベントを検索するサービスです。Laravel3で実装されています。">
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/bootstrap/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap/bootstrap-formhelpers.css') }}
    {{ HTML::style('css/bootstrap/bootstrap-responsive.min.css') }}
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap/bootstrap.min.js') }}
    {{ HTML::script('js/bootstrap/bootstrap-formhelpers-datepicker.js') }}
    {{ HTML::script('js/bootstrap/bootstrap-formhelpers-datepicker.ja_JP.js') }}
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-37364818-2', 'think-sv.net');
        ga('send', 'pageview');

    </script>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a href={{ URL::base() }} class="brand">{{ $title }}</a>
        </div>
    </div>
</div>
@yield('content')
<div id="footer">
    <div class="center">Powerd by Laravel {{ $version }}</div>
    <p class="center">Copyright &copy;  {{ $year }} {{ HTML::link('http://www.think-sv.net/blog/',$author) }}</p>
</div>
</body>
</html>
