<!doctype html>
<html lang="jp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width">
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/bootstrap/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap/bootstrap-formhelpers.css') }}
    {{ HTML::style('css/bootstrap/bootstrap-responsive.min.css') }}
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap/bootstrap.min.js') }}
    {{ HTML::script('js/bootstrap/bootstrap-formhelpers-datepicker.js') }}
    {{ HTML::script('js/bootstrap/bootstrap-formhelpers-datepicker.ja_JP.js') }}
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
    <p class="center">本サービスを利用して発生したいかなる責任も開発者は負いません</p>
    <div class="center">Powerd by Laravel {{ $version }}</div>
    <p class="center">Copyright &copy;  {{ $year }} {{ HTML::link('http://www.think-sv.net/blog/',$author) }}</p>
</div>
</body>
</html>
