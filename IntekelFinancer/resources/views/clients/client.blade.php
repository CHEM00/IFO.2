<x-app-layout> 
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
                                <td class="px-6 py-4">{{ $client->tax_regime_id}}</td>
                                <td class="px-6 py-4">{{ $client->postal_code }}</td>
                                <td class="px-6 py-4">
                                    <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                        class="items-center justify-center py-2 px-4 text-sm font-medium text-white bg-green-700 rounded-lg"
                                        type="button">
                                        Acciones
                                    </button>
                                </td>
                        @endforeach
                    </tbody>
                </table>    
            </div>
        </div>
        <!-- Modal -->
        <div id="clientModal" class="hidden fixed inset-0 z-50 overflow-auto bg-gray-900 bg-opacity-50 items-center justify-center">
            <div class="relative w-full max-w-4xl max-h-[90vh] p-6 bg-gray-100  dark:bg-gray-900 rounded-lg shadow-lg overflow-y-auto">
                <div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-300">
                    <h2 class="text-lg font-semibold text-black dark:text-gray-300">CREAR CLIENTE</h3>
                    <button type="button" class="text-black hover:text-gray-400 dark:text-white dark:hover:text-gray-400" data-modal-toggle="clientModal">✕</button>
                </div>
                <form action="{{route('client.store')}}" method="POST">
                    @csrf
                    <fieldset class="mb-4 border p-3">
                        <legend class="text-lg font-semibold text-black dark:text-gray-300 ">Datos generales</legend>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="name" value="Nombre o razón social" />
                            <x-text-input id="name" class="w-full" type="text" name="name" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="email" value="Correo electrónico" />
                            <x-text-input id="email" class="w-full" type="email" name="email" required />
                        </div>
                        <div>
                            <x-input-label for="rfc" value="RFC" />
                            <x-text-input id="rfc" class="w-full" type="text" name="rfc" required />
                        </div>
                        <div>
                            <x-input-label for="phone" value="Teléfono" />
                            <x-text-input id="phone" class="w-full" type="text" name="phone" required />
                        </div>
                        </fieldset>
                        <fieldset class="mb-4 border p-3">
                            <legend class="text-lg font-semibold text-black dark:text-gray-300">Dirección del cliente</legend>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="postal_code" value="Código postal"/>
                                    <div class="relative w-full md:w-auto flex-grow">
                                        <x-text-input name="postal_code" id="postal_code" class="w-full border"
                                            required />
                                        <button id="fetchAddress"
                                            class="absolute end-1 bottom-0 font-medium rounded-lg text-lg"
                                            type="button">
                                            <i class="fa-solid fa-magnifying-glass text-gray-300"></i>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <x-input-label for="country" value="País" />
                                    <x-text-input id="country" class="w-full" type="text" name="country" required />
                                </div>
                                <div>
                                    <x-input-label for="state" value="Estado" />
                                    <x-text-input id="state" class="w-full" type="text" name="state" required />
                                </div>
                                <div>
                                    <x-input-label for="township" value="Municipio" />
                                    <x-text-input id="township" class="w-full" type="text" name="township" required />
                                </div>
                                <div>
                                    <x-input-label for="locality" value="Localidad" />
                                    <x-text-input id="locality" class="w-full" type="text" name="locality" required />
                                    
                                </div>
                                <div>
                                    <x-input-label for="colony" value="Colonia" />
                                    <select name="" id="">
                                        <option value="">Selecciona una colonia</option>
                                        <option value="1">colonia 1</option>
                                        <option value="2">colonia 2</option>
                                    </select>
                                    
                                </div>
                            </fieldset>
                            <fieldset class="mb-4 border p-3">
                                <legend class="text-lg font-semibold text-black dark:text-gray-300">Datos de pago</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <x-input-label for="payment_type" value="Tipo de pago" />
                                        <x-text-input id="payment_type" class="w-full" type="text" name="payment_type" required />
                                    </div>
                                    <div>
                                        <x-input-label for="payment_method" value="Método de pago" />
                                        <x-text-input id="payment_method" class="w-full" type="text" name="payment_method" required />
                                    </div>
                        <div>
                            <x-input-label for="credit_days" value="Días de crédito" />
                            <x-text-input id="credit_days" class="w-full" type="number" name="credit_days" required />
                        </div>
                        <div>
                            <x-input-label for="bank" value="Banco" />
                            <x-text-input id="bank" class="w-full" type="text" name="bank" required />
                        </div>
                        <div>
                            <x-input-label for="clabe" value="CLABE" />
                            <x-text-input id="clabe" class="w-full" type="text" name="clabe" required />
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-500">Guardar</button>
                        </div>
                        </fieldset>
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
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
<script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</x-app-layout>