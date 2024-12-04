<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('imgs/LogoIntekel.png') }}">
    <script src="https://kit.fontawesome.com/8519bc483d.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Clientes</title>
</head>
<body style="background-color: #EAF6F7 !important">
    <header>
        <!-- Color y menú de la barra superior -->
        <x-Encabezado />
        <!-- Nav tabs -->
        <x-nav-bar />
    </header>
    <main>
        <!-- Contenido de la página -->
        <div class="overflow-x-auto p-2 ">
            <div class="bg-emerald-900 relative shadow-md sm:rounded-small overflow-hidden"">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div>
                        <Strong class="text-white font-mono text-xl">Registro de clientes</Strong>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col flex-auto md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" data-modal-toggle="clientModal" 
                            class=" bg-pink-800 flex items-center justify-center text-white focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2"
                            id="add-button">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Registrar cliente
                        </button>
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-white bg-cyan-600 rounded-lg"
                                type="button">
                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                                Acciones
                            </button>
                            <div id="actionsDropdown" class="hidden rounded-lg shadow w-44 bg-cyan-600">
                                <ul class="py-2 text-sm text-white" aria-labelledby="actionsDropdown">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-800">Generar reporte</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-96">
                        <form class="flex items-center" method="POST" action="{{route('client.index')}}">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg pl-10 pr-2 py-2 focus:ring-primary-500 focus:border-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search" required="">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-dark">
                        <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">RFC</th>
                                <th scope="col" class="px-6 py-3">Razón social</th>
                                <th scope="col" class="px-6 py-3">Regimen fiscal</th>
                                <th scope="col" class="px-6 py-3">Código postal</th>
                                <th scope="col" class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr class="bg-white">
                                    <td class="px-6 py-4">{{ $client->rfc }}</td>
                                    <td class="px-6 py-4">{{ $client->name }}</td>
                                    <td class="px-6 py-4">{{ $client->tax_regime }}</td>
                                    <td class="px-6 py-4">{{ $client->postal_code }}</td>
                                    <td class="px-6 py-4">
                                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                            class="items-center justify-center py-2 px-4 text-sm font-medium text-white bg-green-700 rounded-lg"
                                            type="button">
                                            Acciones
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>
            </div>
            <!-- Modal -->
            <div id="clientModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-75 z-50 hidden">
                <div class="relative w-full max-w-4xl max-h-[90vh] p-6 bg-white rounded-lg shadow-lg overflow-y-auto">
                    <div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-300">
                        <h3 class="text-lg font-semibold text-gray-800">CREAR CLIENTE</h3>
                        <button type="button" class="text-gray-600 hover:text-gray-800" data-modal-toggle="clientModal">✕</button>
                    </div>
                    <form action="{{ route('client.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-gray-700" for="name">Nombre o razón social</label>
                                <input type="text" name="name" id="name" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="tax_regime">Régimen Fiscal</label>
                                <input type="text" name="tax_regime" id="tax_regime" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="email">Email</label>
                                <input type="email" name="email" id="email" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="rfc">RFC</label>
                                <input type="text" name="rfc" id="rfc" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="phone">Teléfono</label>
                                <input type="text" name="phone" id="phone" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="address">Dirección</label>
                                <input type="text" name="address" id="address" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="township">Municipio</label>
                                <input type="text" name="township" id="township" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="state">Estado</label>
                                <input type="text" name="state" id="state" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="postal_code">Código Postal</label>
                                <input type="text" name="postal_code" id="postal_code" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="country">País</label>
                                <input type="text" name="country" id="country" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="payment_type">Tipo de Pago</label>
                                <input type="text" name="payment_type" id="payment_type" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="method_payment">Método de Pago</label>
                                <input type="text" name="method_payment" id="method_payment" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="cdfi">CDFI</label>
                                <input type="text" name="cdfi" id="cdfi" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="credit_days">Días de Crédito</label>
                                <input type="text" name="credit_days" id="credit_days" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="bank">Banco</label>
                                <input type="text" name="bank" id="bank" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-gray-700" for="clabe">CLABE</label>
                                <input type="text" name="clabe" id="clabe" class="w-full p-2 mb-4 bg-gray-100 rounded-md border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500" required>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-500">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modalToggleButtons = document.querySelectorAll('[data-modal-toggle="clientModal"]');
                    const modal = document.getElementById('clientModal');
            
                    modalToggleButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            modal.classList.toggle('hidden');
                        });
                    });
                });
            </script>                   
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</body>
</html>
