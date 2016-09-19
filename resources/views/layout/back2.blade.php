<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Directorio Micsur</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/back/style.css') }}">
    @yield('styles')
</head>
<body>
<header class="Header">
    <div class="Header-content row middle between">
        <figure>
            <!--<img src="http://micsur.org/wp-content/themes/micsur2016/assets/images/logo-micsur.png" alt="Logo Micsur Bogotá">-->
            <span>Micsur logo</span>
        </figure>
        <ul class="Nav-back row">
            <li><a href="http://micsur.org">Micsur</a></li>
            <li><a href="{{route('logout')}}">Cerrar Sesión</a></li>
        </ul>
    </div>
</header>
<main>
    @yield('content')
</main>
<footer class="Footer">
    <a href="mailto:info.micsur.org">info.micsur.org</a>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('scripts')
</body>
</html>