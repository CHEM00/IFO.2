<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('imgs/LogoIntekel.png') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleTable.css') }}">
    <script src="https://kit.fontawesome.com/8519bc483d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Facturas pendientes</title>
</head>
<body style="background-color: #EAF6F7 !important">
    <header>
        <!-- Color y menú de la barra superior -->
        <x-barra-superior />
        <!-- Nav tabs -->
        <x-nav-bar />
    </header>
    <main>
        <!-- Contenido de la página -->
        <div class="overflow-x-auto p-2 ">
            <div class="bg-emerald-900 relative shadow-md sm:rounded-small overflow-hidden" id="div_header">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div>
                        <Strong class="text-white font-mono text-xl">Facturas pendientes</Strong>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col flex-auto md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" data-modal-toggle="softGreenModal"
                            class=" bg-pink-800 flex items-center justify-center text-white focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2"
                            id="add-button">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Añadir factura
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
                            <button id="statusDropdownButton" data-dropdown-toggle="StatusDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-white bg-rose-800 rounded-lg "
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    class="h-4 w-4 mr-2 text-white" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Pendientes
                            </button>
                            <div id="StatusDropdown" class="hidden rounded-lg shadow w-44 bg-rose-800">
                                <ul class="py-2 text-sm text-white" aria-labelledby="statusDropdownButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-800">Pendientes</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-800">Timbradas</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-800">Canceladas</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-96">
                        <form class="flex items-center">
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
                                <th scope="col" class="px-6 py-3">Folio</th>
                                <th scope="col" class="px-6 py-3">Fecha de emisión</th>
                                <th scope="col" class="px-6 py-3">Cliente</th>
                                <th scope="col" class="px-6 py-3">Monto</th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">12345</td>
                                <td class="px-6 py-4">2024-10-29</td>
                                <td class="px-6 py-4">Intekel</td>
                                <td class="px-6 py-4">$100.00 MXN</td>
                                <td class="px-6 py-4">
                                    <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                        class="items-center justify-center py-2 px-4 text-sm font-medium text-white bg-green-700 rounded-lg "
                                        type="button">
                                        Acciones
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="softGreenModal" tabindex="-1" aria-hidden="true"
            class="fixed inset-0 flex items-center justify-center bg-slate-900 bg-opacity-60 z-50 hidden">
            <div
                class="relative w-full max-w-6xl max-h-[90vh] p-6 bg-gray-800 rounded-lg shadow-lg text-gray-200 overflow-y-auto">
                <div class="flex justify-between items-center pb-4 mb-4 border-b border-emerald-600">
                    <h3 class="text-lg font-semibold text-emerald-300">CREAR FACTURA</h3>
                    <button type="button" class="text-emerald-400 hover:text-emerald-300"
                        data-modal-toggle="softGreenModal">✕</button>
                </div>
                <!-- Acordeón: Datos del Cliente -->
                <div id="accordion-flush" data-accordion="collapse">
                    <h2 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full py-3 text-gray-400 font-medium border-b border-gray-500 gap-3"
                            data-accordion-target="#accordion-flush-body-2">
                            <span>Datos del Cliente</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-2" class="hidden p-4 text-sm text-gray-400 bg-gray-900 rounded-lg">
                        <!-- Selección de Cliente -->
                        <label class="block mb-2 text-emerald-400">Seleccione el cliente</label>
                        <select class="w-full p-2 mb-4 bg-gray-700 text-gray-300 rounded-md border border-gray-600">
                            <option>Cliente A</option>
                            <option>Cliente B</option>
                            <option>Cliente C</option>
                        </select>
                        <!-- Datos del Cliente en formato compacto -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <span class="text-emerald-400">RFC:</span>
                                <p class="text-gray-400 bg-gray-800 rounded p-1">RFC1234</p>
                            </div>
                            <div>
                                <span class="text-emerald-400">Dirección:</span>
                                <p class="text-gray-400 bg-gray-800 rounded p-1">Calle Falsa 123</p>
                            </div>
                            <div>
                                <span class="text-emerald-400">Código Postal:</span>
                                <p class="text-gray-400 bg-gray-800 rounded p-1">12345</p>
                            </div>
                            <div>
                                <span class="text-emerald-400">Correo:</span>
                                <p class="text-gray-400 bg-gray-800 rounded p-1">correo@ejemplo.com</p>
                            </div>
                            <div class="col-span-2">
                                <span class="text-emerald-400">Razón Social:</span>
                                <p class="text-gray-400 bg-gray-800 rounded p-1">Empresa XYZ</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Acordeón: Datos de la Factura -->
                <div id="accordion-flush" data-accordion="collapse">
                    <h2 id="accordion-flush-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full py-3 text-gray-400 font-medium border-b border-gray-500 gap-3 mt-4"
                            data-accordion-target="#accordion-flush-body-3">
                            <span>Datos de la Factura</span>
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-3" class="hidden p-4 text-sm text-gray-400 bg-gray-900 rounded-lg">
                        <!-- Folio (Solo visible) -->
                        <div class="mb-4">
                            <span class="text-emerald-400">Folio:</span>
                            <p class="text-gray-400 bg-gray-800 rounded p-1">Folio12345</p>
                        </div>
                        <!-- Campos Select de Datos de la Factura -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-emerald-400">Serie</label>
                                <select class="w-full p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600">
                                    <option>Serie A</option>
                                    <option>Serie B</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-emerald-400">Fecha</label>
                                <select class="w-full p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600">
                                    <option>2024-10-29</option>
                                    <option>2024-10-30</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-emerald-400">Uso de CFDI</label>
                                <select class="w-full p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600">
                                    <option>Gastos Generales</option>
                                    <option>Adquisición de Bienes</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-emerald-400">Forma de pago</label>
                                <select class="w-full p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600">
                                    <option>Transferencia Electrónica</option>
                                    <option>Efectivo</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-emerald-400">Método de pago</label>
                                <select class="w-full p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600">
                                    <option>PAGO EN UNA SOLA EXHIBICIÓN</option>
                                    <option>PAGO EN PARCIALIDADES</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tabla de Artículos -->
                <div class="mt-6">
                    <h4 class="text-emerald-300 mb-2">Artículos</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-400 border border-gray-600">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2">Artículo</th>
                                    <th class="px-4 py-2">Tipo de Artículo</th>
                                    <th class="px-4 py-2">Descripción</th>
                                    <th class="px-4 py-2">Precio Unitario</th>
                                    <th class="px-4 py-2">Cantidad</th>
                                    <th class="px-4 py-2">Descuento</th>
                                    <th class="px-4 py-2">IVA%</th>
                                    <th class="px-4 py-2">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-gray-800 border-b border-gray-600">
                                    <td class="px-4 py-2">Artículo 1</td>
                                    <td class="px-4 py-2">Tipo A</td>
                                    <td class="px-4 py-2">Descripción del artículo 1</td>
                                    <td class="px-4 py-2">$100.00</td>
                                    <td class="px-4 py-2">1</td>
                                    <td class="px-4 py-2">0%</td>
                                    <td class="px-4 py-2">16%</td>
                                    <td class="px-4 py-2">$116.00</td>
                                </tr>
                                <tr class="bg-gray-800 border-b border-gray-600">
                                    <td class="px-4 py-2">Artículo 2</td>
                                    <td class="px-4 py-2">Tipo B</td>
                                    <td class="px-4 py-2">Descripción del artículo 2</td>
                                    <td class="px-4 py-2">$200.00</td>
                                    <td class="px-4 py-2">2</td>
                                    <td class="px-4 py-2">10%</td>
                                    <td class="px-4 py-2">16%</td>
                                    <td class="px-4 py-2">$464.00</td>
                                </tr>
                                <!-- Añadir más filas según sea necesario -->
                            </tbody>
                        </table>
                    </div>
                    <!-- Encabezado Detalles -->
                    <div class="mt-6">
                        <h4 class="text-lg font-semibold text-emerald-300">Detalles</h4>
                        <textarea rows="4"
                            class="mt-2 bg-gray-700 rounded-lg w-full px-3 py-2 text-emerald-300 placeholder:text-gray-400"
                            placeholder="Ingrese detalles adicionales..."></textarea>
                        <div class="grid gap-4 mt-4 sm:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-emerald-400">Seleccione el tipo de
                                    moneda</label>
                                <select class="bg-gray-700 rounded-lg w-full px-3 py-2 text-emerald-300">
                                    <option>USD</option>
                                    <option>MXN</option>
                                    <option>EUR</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-emerald-400">Subtotal</label>
                                <input type="text" class="bg-gray-700 rounded-lg w-full px-3 py-2 text-emerald-300"
                                    placeholder="$0.00" readonly>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-emerald-400">IVA</label>
                                <input type="text" class="bg-gray-700 rounded-lg w-full px-3 py-2 text-emerald-300"
                                    placeholder="$0.00" readonly>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-emerald-400">Total</label>
                                <input type="text" class="bg-gray-700 rounded-lg w-full px-3 py-2 text-emerald-300"
                                    placeholder="$0.00" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Botones para agregar artículo, timbrar y cancelar -->
                <div class="flex justify-end mt-4 space-x-4">
                    <button class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-500">Agregar
                        Artículo</button>
                    <button
                        class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-500">Timbrar</button>
                    <button class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-500"
                        data-modal-toggle="softGreenModal">Cancelar</button>
                </div>
            </div>
        </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
