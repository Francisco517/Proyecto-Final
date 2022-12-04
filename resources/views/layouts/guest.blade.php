<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/custom.css','resources/css/font-awesome.min.css',
                    'resources/css/kube.css','resources/js/kube.js'])
    </head>
    <body>
        <div class="main-nav">
            <div class="container">
                <header class="group top-nav">
                    <nav id="navbar-1" class="navbar item-nav">
                        <ul>
                            <li><a href="/uniformes">Inicio</a></li>
                            <li><a href="/register">Registro</a></li>
                        </ul>
                    </nav>
                </header>
            </div>
        </div>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
