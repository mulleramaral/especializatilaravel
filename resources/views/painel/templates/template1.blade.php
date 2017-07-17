<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titulo or 'Painel Curso' }}</title>

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{url('/assets/painel/css/style.css')}}">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
    <!-- Optional theme -->
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap-theme.min.css')}}">
</head>
<body>
<div class="container">
    @yield('content')
</div>

<!-- SCRIPTS JS -->

<!-- jQuery -->
<script src="{{url('/assets/js/jquery.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{url('/assets/js/bootstrap.min.js')}}"></script>
</body>
</html>
