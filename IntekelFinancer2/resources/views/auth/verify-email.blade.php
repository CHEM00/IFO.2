<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Correo Electrónico</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Verifica tu Correo Electrónico</h2>
        <p class="mb-4">Antes de continuar, por favor revisa tu correo electrónico para un enlace de verificación.</p>
        <p class="mb-4">Si no recibiste el correo electrónico,</p>
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Reenviar Correo de Verificación</button>
        </form>
    </div>
</body>
</html>