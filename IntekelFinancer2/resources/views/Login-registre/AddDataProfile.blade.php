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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <!-- Vertical Navigation Bar -->
            <nav class="w-full md:w-1/4 h-min bg-white shadow-lg rounded-lg p-4 mb-6 md:mb-0 md:mr-6">
                <ul class="space-y-4">
                    <li>
                        <a href="" class="block text-lg font-medium text-gray-800 hover:text-indigo-500">Datos
                            Generales</a>
                    </li>
                    <li>
                        <a href="" class="block text-lg font-medium text-indigo-500">Quickbooks</a>
                    </li>
                </ul>
            </nav>
            <!-- Main Content -->
            <div class="w-full md:w-3/4 max-h-[90vh] overflow-auto bg-white shadow-lg rounded-lg p-6">
                @if (session('error'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                text: '{{ session('error') }}',
                            });
                        });
                    </script>
                @endif
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <fieldset class="mb-6">
                        <legend class="text-2xl font-bold text-gray-800">Datos Generales</legend>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4 border border-gray-300 rounded-lg p-4">
                            <div>
                                <label for="social_reason" class="block text-lg font-medium text-gray-700">Razón
                                    social</label>
                                <input type="text" name="social_reason" id="social_reason"
                                    value="{{ $user->social_reason }}"
                                    class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm text-lg"
                                    >
                            </div>
                            <div>
                                <label for="tax_regime" class="block text-lg font-medium text-gray-700">Regimen
                                    fiscal</label>
                                <select name="tax_regime" id="tax_regime"
                                    class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 text-lg">
                                    @foreach ($TaxRegimes as $taxRegime)
                                        <option value="{{ $taxRegime->id }}"
                                            {{ $user->tax_regime_id == $taxRegime->id ? 'selected' : '' }}>
                                            {{ $taxRegime->c_TaxRegime }}|{{ $taxRegime->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="rfc" class="block text-lg font-medium text-gray-700">RFC</label>
                                <input type="text" name="rfc" id="rfc" value="{{ $user->rfc }}"
                                    class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 text-lg">
                            </div>
                            <div>
                                <label for="hour_zone" class="block text-lg font-medium text-gray-700">Zona
                                    horaria</label>
                                <input type="text" name="hour_zone" value="{{ $user->hour_zone }}" id="hour_zone"
                                    class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"
                                    >
                            </div>
                        </div>
                    </fieldset>

                    <form id="addressForm">
                        <fieldset class="mb-6">
                            <legend class="text-2xl font-bold text-gray-800">Datos del domicilio</legend>
                            <div class="max-h-[75vh] overflow-y-auto p-4 border border-gray-300 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="PostalCode" class="block text-lg font-medium text-gray-700">Código postal</label>
                                        <div class="relative w-full md:w-auto flex-grow">
                                            <input type="text" name="postal_code" id="PostalCode" value="{{ $user->postal_code ?? '' }}"
                                                class="mt-1 block w-full p-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"
                                                required>
                                            <button id="fetchAddress" class="absolute end-1 bottom-0 font-medium rounded-lg text-lg" type="button">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="country" class="block text-lg font-medium text-gray-700">País</label>
                                        <input type="text" name="country" id="country" value="{{ $user->country ?? '' }}"
                                            class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                                    </div>
                                    <div>
                                        <label for="state" class="block text-lg font-medium text-gray-700">Estado</label>
                                        <input type="text" name="state" id="state" value="{{ $user->state ?? '' }}"
                                            class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                                    </div>
                                    <div>
                                        <label for="locality" class="block text-lg font-medium text-gray-700">Localidad</label>
                                        <input type="text" name="locality" id="locality" value="{{ $user->locality ?? '' }}"
                                            class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                                    </div>
                                    <div>
                                        <label for="township" class="block text-lg font-medium text-gray-700">Municipio</label>
                                        <input type="text" name="township" id="township" value="{{ $user->township ?? '' }}"
                                            class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                                    </div>
                                    <div>
                                        <label for="colonies" class="block text-lg font-medium text-gray-700">Colonias</label>
                                        <select id="colonies"
                                            class="mt-1 block w-full p-2 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </form>
                    
                                    <div>
                                        <label for="address"
                                            class="block text-lg font-medium text-gray-700">Dirección</label>
                                        <input type="text" name="address" id="address"
                                            value="{{ $user->address }}"
                                            class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"
                                            >
                                    </div>
                                    <div>
                                        <label for="phone"
                                            class="block text-lg font-medium text-gray-700">Teléfono</label>
                                        <input type="number" name="phone" id="phone" value="{{ $user->phone }}"
                                            class="mt-1 block rounded-lg w-full border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"
                                            >
                                    </div>
                                    <div>
                                        <label for="logo" class="block text-lg font-medium text-gray-700">Logo</label>
                                        <input type="file" name="logo" id="logo" value="{{ $user->logo }}"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                    <div class="flex justify-end">
                        <button type="submit"
                            class="mt-6 px-6 py-3 bg-emerald-500 text-white text-lg font-medium rounded-lg hover:bg-emerald-800">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
        document.getElementById('PostalCode').addEventListener('blur', function () {
    const postalCode = this.value;

    if (!postalCode) {
        alert('Por favor ingrese un código postal.');
        return;
    }

    // Realiza la solicitud AJAX
    fetch(`{{ route('user.get.address') }}?postal_code=${postalCode}`)
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
        } else {
            document.getElementById('state').value = data.State ? data.State.stateName : '';
            document.getElementById('township').value = data.Township ? data.Township.description : '';
            document.getElementById('locality').value = data.Locality ? data.Locality.description : '';
        }
    })
    .catch(error => console.error('Error:', error));

});

    </script>
</body>
</html>