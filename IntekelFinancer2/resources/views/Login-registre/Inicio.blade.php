<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset ('imgs/LogoIntekel.png')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Inicio</title>
</head>
<body class="bg-gray-100">
    <!-- Color y menú de la barra superior -->
    <x-Encabezado/>
    <!-- Nav tabs -->
    <x-nav-bar/>
</body>
</html>
