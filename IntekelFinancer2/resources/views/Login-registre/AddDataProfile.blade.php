<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('imgs/LogoIntekel.png') }}">
    <title>Completar registro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            zoom: 90%;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header>
        <x-Encabezado />
        <x-Nav-bar />
    </header>
    <main class="container mx-auto p-4">
        <div class="shadow-lg rounded-lg p-8" style="background-color:#EAF6F7">
            <h2 class="text-3xl font-bold mb-8 justify-center text-gray-800">Configuración del perfil</h2>
            <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="social_reason" class="block text-lg font-medium text-gray-700">Razón Social</label>
                        <input type="text" name="social_reason" id="social_reason" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                    </div>
                    <div>
                        <label for="address" class="block text-lg font-medium text-gray-700">Dirección</label>
                        <input type="text" name="address" id="address" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                    </div>
                    <div>
                        <label for="phone" class="block text-lg font-medium text-gray-700">Teléfono</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                    <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                                </svg>
                            </span>
                            <input type="text" name="phone" id="phone" class="pl-10 mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>
                        </div>
                    </div>
                    <div>
                        <label for="city" class="block text-lg font-medium text-gray-700">Ciudad</label>
                        <input type="text" name="city" id="city" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                    </div>
                    <div>
                        <label for="state" class="block text-lg font-medium text-gray-700">Estado</label>
                        <input type="text" name="state" id="state" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                    </div>
                    <div>
                        <label for="country" class="block text-lg font-medium text-gray-700">País</label>
                        <input type="text" name="country" id="country" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                    </div>
                    <div>
                        <label for="zip_code" class="block text-lg font-medium text-gray-700">Código Postal</label>
                        <input type="text" name="zip_code" id="zip_code" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                    </div>
                    <div>
                        <label for="rfc" class="block text-lg font-medium text-gray-700">RFC</label>
                        <input type="text" name="rfc" id="rfc" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                    </div>
                    <div>
                        <label for="logo" class="block text-lg font-medium text-gray-700">Logo</label>
                        <input type="file" name="logo" id="logo" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                    </div>
                <div class="mt-8">
                    <button type="submit" class="w-full bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-lg">Guardar</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>