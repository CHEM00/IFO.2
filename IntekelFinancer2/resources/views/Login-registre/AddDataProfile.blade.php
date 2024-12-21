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
            <!-- Sidebar -->
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
                                    class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm text-lg">
                            </div>
                            <div>
                                <label for="c_TaxRegime" class="block text-lg font-medium text-gray-700">Regimen
                                    fiscal</label>
                                <select name="c_TaxRegime" id="c_TaxRegime"
                                    class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 text-lg" required>
                                    @foreach ($TaxRegimes as $taxRegime)
                                        <option value="{{ $taxRegime->c_TaxRegime }}" {{ $user->c_TaxRegime == $taxRegime->c_TaxRegime ? 'selected' : '' }}>
                                        {{$taxRegime->c_TaxRegime}} {{ $taxRegime->description }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="rfc" class="block text-lg font-medium text-gray-700">RFC</label>
                                <input type="text" name="rfc" id="rfc" value="{{ $user->rfc }}"
                                    class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm text-lg">
                                <p id="resultado"></p>
                            </div>
                            <div>
                                <label for="hour_zone" class="block text-lg font-medium text-gray-700">Zona
                                    horaria</label>
                                <input type="text" name="hour_zone" value="{{ $user->hour_zone }}" id="hour_zone"
                                    class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg "
                                    readonly>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mb-6">
                        <legend class="text-2xl font-bold text-gray-800">Datos del domicilio</legend>
                        <div id="addressForm">
                            <div class="max-h-[75vh] overflow-y-auto p-4 border border-gray-300 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="postal_code" class="block text-lg font-medium text-gray-700">Código
                                            postal</label>
                                        <div class="relative w-full md:w-auto flex-grow">
                                            <input type="text" name="postal_code" id="postal_code"
                                                value="{{ $user->c_PostalCode ?? '' }}"
                                                class="mt-1 block w-full p-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"
                                                required>
                                            <button id="fetchAddress"
                                                class="absolute end-1 bottom-0 font-medium rounded-lg text-lg"
                                                type="button">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="country"
                                            class="block text-lg font-medium text-gray-700">País</label>
                                        <input type="text" name="country" id="country"
                                            value="{{ $user->c_Country ?? '' }}"
                                            class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"
                                            readonly>
                                    </div>
                                    <div>
                                        <label for="state"
                                            class="block text-lg font-medium text-gray-700">Estado</label>
                                        <input type="text" name="state" id="state"
                                            value="{{ $user->c_State ?? '' }}"
                                            class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"
                                            readonly>
                                    </div>
                                    <div>
                                        <label for="locality"
                                            class="block text-lg font-medium text-gray-700">Localidad</label>
                                        <input type="text" name="locality" id="locality"
                                            value="{{ $user->c_Locality ?? '' }}"
                                            class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"
                                            readonly>
                                    </div>
                                    <div>
                                        <label for="township"
                                            class="block text-lg font-medium text-gray-700">Municipio</label>
                                        <input type="text" name="township" id="township"
                                            value="{{ $user->c_Township ?? '' }}"
                                            class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"
                                            readonly>
                                    </div>
                                    <div>
                                        <label for="colonies"
                                            class="block text-lg font-medium text-gray-700">Colonía</label>
                                        <select id="colonies" name="colonies"
                                            class="mt-1 block w-full p-2 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                                            <option value="">{{$user->c_Colony}}</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                <div>
                                    <label for="address"
                                        class="block text-lg font-medium text-gray-700">Dirección</label>
                                    <input type="text" name="address" id="address"
                                        value="{{ $user->address }}"
                                        class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                                </div>
                                <div>
                                    <label for="phone"
                                        class="block text-lg font-medium text-gray-700">Teléfono</label>
                                    <input type="number" name="phone" id="phone" value="{{ $user->phone }}"
                                        class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg">
                                </div>
                                <div>
                                    <label for="logo" class="block text-lg font-medium text-gray-700">Logo</label>
                                    <input type="file" name="logo" id="logo"
                                        class="mt-1 block w-full pl-1 rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg"
                                        value="{{$user->logo}}">
                                </div>
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
    <!-- Script para obtener la dirección a partir del código postal -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Detectar la zona horaria automáticamente
            const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;

            // Asignar la zona horaria al campo de texto
            document.getElementById("hour_zone").value = timezone;

        });
    </script>
    <!-- Script para obtener la dirección a partir del código postal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('postal_code').addEventListener('blur', function() {

                const postalCode = this.value;

                if (!postalCode) {
                    Swal.fire({
                        text: 'Por favor ingrese un código postal.'
                    });
                    return;
                }


                // Realiza la solicitud AJAX
                fetch(`{{ route('user.get.address') }}?postal_code=${postalCode}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            document.getElementById('state').value = data.State ? data.State.stateName :
                                '';
                            document.getElementById('township').value = data.Township ? data.Township
                                .description : '';
                            document.getElementById('country').value = data.Country ? data.Country : '';
                            document.getElementById('locality').value = data.Locality ? data.Locality
                                .description : '';
                            console.log(data); // Verifica la respuesta aquí 
                            const coloniesSelect = document.getElementById('colonies');
                            coloniesSelect.innerHTML = ''; // Limpia el select
                            if (data.Colonies && data.Colonies.length > 0) {
                                data.Colonies.forEach(colony => {
                                    const option = document.createElement('option');
                                    option.value = colony.c_Colony;
                                    option.textContent = colony.settlementName;
                                    coloniesSelect.appendChild(option);
                                });
                            } else {
                                const option = document.createElement('option');
                                option.value = '';
                                option.textContent = 'No hay colonias disponibles';
                                coloniesSelect.appendChild(option);
                            }
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
    <!-- Script para validar el RFC -->
    <script>
        //Función para validar un RFC
        function rfcValido(rfc, aceptarGenerico = true) {
            const re =
                /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
            var validado = rfc.match(re);

            if (!validado) return false;

            const digitoVerificador = validado.pop(),
                rfcSinDigito = validado.slice(1).join(''),
                len = rfcSinDigito.length;

            const diccionario = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
                indice = len + 1;
            var suma, digitoEsperado;

            if (len == 12) suma = 0
            else suma = 481;

            for (var i = 0; i < len; i++)
                suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);

            digitoEsperado = 11 - suma % 11;
            if (digitoEsperado == 11) digitoEsperado = 0;
            else if (digitoEsperado == 10) digitoEsperado = "A";

            if ((digitoVerificador != digitoEsperado) &&
                (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
                return false;
            else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
                return false;

            return rfcSinDigito + digitoVerificador;
        }

        //Evento de validación en tiempo real cuando el usuario escribe en el input
        document.getElementById('rfc').addEventListener('input', function() {
            var rfc = this.value.trim().toUpperCase();
            var resultado = document.getElementById('resultado');
            var rfcCorrecto = rfcValido(rfc);

            if (rfcCorrecto) {
                resultado.classList.add("ok");
                resultado.innerText = "Válido";
            } else {
                resultado.classList.remove("ok");
                resultado.innerText = "No válido";
            }
        });
    </script>
</body>
</html>
