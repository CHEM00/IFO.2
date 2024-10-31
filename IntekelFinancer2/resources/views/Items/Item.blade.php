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
    <title>Productos y servicios</title>
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
                        <Strong class="text-white font-mono text-xl">Lista de productos y servicios</Strong>
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
                            Añadir item
                        </button>
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
                                <th scope="col" class="px-6 py-3">Clave del item</th>
                                <th scope="col" class="px-6 py-3">Tipo de item</th>
                                <th scope="col" class="px-6 py-3">Descripción</th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">12345</td>
                                <td class="px-6 py-4">John Doe</td>
                                <td class="px-6 py-4">$100.00</td>
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
    </main>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>
</html>