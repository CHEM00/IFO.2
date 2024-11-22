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
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <style>
        body {
            zoom: 90%;
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header>
        <x-Encabezado />
        <x-Nav-bar />
    </header>
    <main class="container mx-auto p-4">
        <div class="flex flex-col md:flex-row">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Vertical Navigation Bar -->
            <nav class="w-full md:w-1/4 h-min bg-white shadow-lg rounded-lg p-4 mb-6 md:mb-0 md:mr-6">
                <ul class="space-y-4">
                    <li>
                        <a href="" class="block text-lg font-medium text-gray-800 hover:text-indigo-500">Datos Generales</a>
                    </li>
                    <li>
                        <a href="" class="block text-lg font-medium text-indigo-500">Quickbooks</a>
                    </li>
                </ul>
            </nav>
            <!-- Main Content -->
            <div class="w-full md:w-3/4 max-h-[90vh] overflow-auto bg-white shadow-lg rounded-lg p-6">
                <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <fieldset class="mb-6">
                        <legend class="text-2xl font-bold text-gray-800">Datos Generales</legend>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4 border border-gray-300 rounded-lg p-4">
                            <div>
                                <label for="social_reason" class="block text-lg font-medium text-gray-700">Razón social</label>
                                <input type="text" name="social_reason" id="social_reason" value="{{$user->social_reason}}" class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm text-lg" required>
                            </div>
                            <div>
                                <label for="tax_regime" class="block text-lg font-medium text-gray-700">Regimen fiscal</label>
                                <input type="text" name="tax_regime" id="tax_regime" value="{{$user->tax_regime}}" class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm text-lg" required>
                            </div>
                            <div>
                                <label for="rfc" class="block text-lg font-medium text-gray-700">RFC</label>
                                <input type="text" name="rfc" id="rfc" value="{{$user->rfc}}" class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                            </div>
                            <div>
                                <label for="hour_zone" class="block text-lg font-medium text-gray-700">Zona horaria</label>
                                <input type="text" name="hour_zone" value="{{$user->hour_zone}}" id="hour_zone" class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mb-6">
                        <legend class="text-2xl font-bold text-gray-800">Datos del domicilio</legend>
                        <div class="max-h-[75vh] overflow-y-auto p-4 border border-gray-300 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="postal_code" class="block text-lg font-medium text-gray-700">Código postal</label>
                                    <input type="text" name="postal_code" id="postal_code" value="{{$user->postal_code}}" class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                                </div>
                                <div>
                                    <label for="township" class="block text-lg font-medium text-gray-700">Municipio</label>
                                    <input type="text" name="township" id="township" value="{{$user->township}}" class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                                </div>
                                <div>
                                    <label for="state" class="block text-lg font-medium text-gray-700">Estado</label>
                                    <input type="text" name="state" id="state" value="{{$user->state}}" class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                                </div>
                                <div>
                                    <label for="country" class="block text-lg font-medium text-gray-700">País</label>
                                    <input type="text" name="country" id="country" value="{{$user->country}}" class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                                </div>
                                <div>
                                    <label for="address" class="block text-lg font-medium text-gray-700">Dirección</label>
                                    <input type="text" name="address" id="address" value="{{$user->address}}" class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                                </div>
                                <div>
                                    <label for="phone" class="block text-lg font-medium text-gray-700">Teléfono</label>
                                    <input type="number" name="phone" id="phone" value="{{$user->phone}}" class="mt-1 block rounded-lg w-full border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg" required>
                                </div>
                                <div>
                                    <label for="logo" class="block text-lg font-medium text-gray-700">Logo</label>
                                    <input type="file" name="logo" id="logo" value="{{$user->logo}}" class="mt-1 block w-full border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="flex justify-end">
                        <button type="submit" class="mt-6 px-6 py-3 bg-emerald-500 text-white text-lg font-medium rounded-lg hover:bg-emerald-800">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>