<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Meta Description -->
    <meta name="description"
        content="Aplikasi 'Makan Dimana?' hadir untuk memudahkan Anda dalam menentukan tempat makan dengan pilihan acak.">

    <!-- Meta Keywords -->
    <meta name="keywords"
        content="Makan Dimana, pilihan makanan acak, keputusan makan, pilihan restoran, eksplorasi kuliner, di mana makan, opsi makanan, aplikasi makan, saran restoran, penemuan tempat makan, keputusan makanan, makan dengan mudah.">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
