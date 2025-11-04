<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eoners - @yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 ">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-4xl font-extrabold uppercase text-blue-800">
                    Eoners 
                </h1>
                <nav class="flex gap-4 items-center">
                    <a href="/login" class="font-bold uppercase text-gray-700 text-sm font-sans">Login</a>
                    <a href="/register" class="font-bold uppercase text-gray-700 text-sm font-sans">Crear cuenta</a>
                </nav>
            </div>
        </header>
        <main class="cointainer mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield('title')</h2>
            <div class="text-center">
                @yield('contain')
            </div>
        </main>
        <footer class="text-center p5 text-gray-500 uppercase">
            Eoners - Todos los derechos reservados - {{ now()->year }}
        </footer>
    </body>
</html>